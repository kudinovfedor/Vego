<?php 

	if ( !function_exists('register_rest_api_route') ) {
		function register_rest_api_route (WP_REST_Request $req) {

			$params = $req->get_params();
			foreach ($params as $k=>$param) {
				$params[$k] = filter_var($param, FILTER_SANITIZE_STRING);

				if (in_array($k, ['name', 'tel']) && $param === '') {
					return array('status' => false, 'message' => __('Всі поля повинні бути заповнені!', 'brainworks'));
				}
			} 

			if ($params['agree'] !== 'yes') {
				return array('status' => false, 'message' => __('Будь ласка, підтвердіть згоду на обробку даних!', 'brainworks'));
			}

			// Sending email
			
				$email_to = get_option('admin_email');
				$additional_emails = str_replace(" ", "",  get_theme_mod("bw_additional_contact_emails", ''));
				if ($additional_emails !== '') {
					$email_to .= $additional_emails;
				}
				$email_subject = __('ОБРАТНАЯ СВЯЗЬ', 'brainworks');
				$email_headers = array(
					'Content-Type: text/html; charset=UTF-8',
					'From: ' . get_bloginfo('name') . ' ' . '<'.$email_to.'>'
				);
				$email_content = '
					<h1>' . $email_subject . '</h1>
					<small>Страница формы: '.$req->get_header('referer').'</small>
					<p>Имя клиента: ' . $params['name'] . '</p>
					<p>Номер телефона: ' . $params['tel'] . '</p>
				';

				if (isset($params['message'])) {
					$email_content .= '<p>Почтовый ящик: ' . $params['message'] . '</p>';
				}

				if ($email_to) {
					if (wp_mail($email_to, $email_subject, $email_content, $email_headers)) {
						return array('status' => true);
					} else {
						return array('status' => false, 'message' => __('Відправка даних не вдалася! Спробуйте ще раз.', 'brainworks'));
					}
				} else {
					return array('status' => true);
				}

			// Sending email end

		}

		add_action( 'rest_api_init', function () {
			register_rest_route( 'brainworks', 'contact', array(
				'methods' => 'POST',
				'callback' => 'register_rest_api_route'
			) );
		} );
	}
?>