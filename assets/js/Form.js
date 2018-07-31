(function (global) {

	global.BrainWorksForm = (function () {
		var 
			/**
			 * @type {HTMLInputElement[]} The inputs of the form
			 */
			formInputs,
			/**
			 * @type {Object} The data to send
			 */
			formData = {},
			/**
			 * @type {HTMLDivElement} The error container to show the errors
			 */
			formErrorContainer,
			/**
			 * @type {HTMLDivElement} The success container to show the success message
			 */
			formSuccessContainer;


		/**
		 * Send promised XHR request to the server
		 * @param  {string} url  Url of the endpoint
		 * @param  {Object} data Object to send
		 * @return {Promise}     Promise with pending status
		 */
		const sendRequest = (url, data) => {
			return new Promise((resolve, reject) => {
				url = url || '/';
				data = data || {};

				var 
					/**
					 * @type {XMLHttpRequest}
					 */
					xhr = new XMLHttpRequest();
			

				xhr.open('POST', url);
				xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

				xhr.onload = () => {
					if (xhr.status >= 200 && xhr.status < 301) {
						resolve(xhr.responseText);
					} else {
						reject(xhr.status, xhr.responseText);
					}
				}

				xhr.onerror = () => {
					reject(xhr.status, xhr.responseText);
				}

				xhr.send(JSON.stringify(data));
			});
		}

		/**
		 * Show error if its exists (works with every container)
		 * @param  {HTMLDivElement} container The container of the error (or success, etc.) (Html element)
		 * @param  {string|null} error     If error is string - show it, else - hide it
		 * @return {boolean}           True if error is showed, else - false
		 */

		var toggleAlert = (container, message) => {
			if (message) {
				container.style.display = 'block';
				container.textContent = message;
				return true;
			} else {
				container.style.display = 'none';
				container.textContent = '';
				return false;
			}
		}

		/**
		 * Empty inputs in the form. Data to empty string
		 * @param  {HTMLInputElement[]} inputs
		 */
		var emptyInputs = (inputs) => {
			var 
				/**
				 * The length of the inputs
				 * @type {number}
				 */
				inputsLength = inputs.length;

			for (var i = 0; i < inputsLength; i++) {
				inputs[i].value = '';
				formData[inputs[i].name] = '';
			}
		}

		/**
		 * Submit form listener for form
		 * @param  {Event} event Submit event
		 * @return {void}
		 */
		var submitForm = function (event) {
			event.preventDefault();
			var 
				/**
				 * Validate data in inputs
				 * @type {boolean}
				 */
				isFilled = true;

			for (var dataItem in formData) {
				if (formData[dataItem] === '') {
					isFilled = false;
					toggleAlert(formErrorContainer, 'Все поля должны быть заполнены!');
				}
			}

			if (isFilled === true) {
				sendRequest(event.target.getAttribute('action'), formData)
					.then(response => {
						response = JSON.parse(response);
						if (response.status === true) {
							emptyInputs(formInputs);
							toggleAlert(formSuccessContainer, 'Вы успешно отправили данные для обратной связи!');
						} else {
							toggleAlert(formErrorContainer, response.message);
						}
					})
					.catch(error => {
						console.error(error)
					});
			}

		}

		/**
		 * The constructor of the controller form with sending request
		 * @param {HTMLFormElement|null} form The form to control
		 */
		function BrainWorksForm (form) {

			if (form !== null) {

				formErrorContainer = form.querySelector('.alert-danger');
				formSuccessContainer = form.querySelector('.alert-success');
				formInputs = form.querySelectorAll('input, select, textarea');

				if (formInputs) {
					var 
						/**
						 * @type {number}
						 */
						formInputsLength = formInputs.length;

					for (var i = 0; i < formInputsLength; i++) {
						formData[formInputs[i].name] = formInputs[i].value;

						formInputs[i].addEventListener('change', (event) => {
							formData[event.target.name] = event.target.value;
						});
					}
				}

				form.addEventListener('submit', submitForm.bind(this));


			}

		}

		return BrainWorksForm;

	}())

	/**
	 * Factory to create Form Object by selector
	 * @param  {string} element Selector of the form
	 * @return {BrainWorksForm[]|boolean}  Created form or false if selector is incorrect
	 */
	global.createBrainWorksForms = function (elements) {
		elements = document.querySelectorAll(elements);

		if (elements.length > 0) {
			var
				/**
				 * The length of the elements NodeList
				 * @type {number}
				 */
				elementsLength = elements.length,
				/**
				 * The array of the forms
				 * @type {BrainWorksForm[]}
				 */
				forms = [];
 
			for (var i = 0; i < elementsLength; i++) {
				forms.push((new BrainWorksForm(elements[i])));
			}

			return forms;
		} else {
			return false;
		}

	}

}(this))