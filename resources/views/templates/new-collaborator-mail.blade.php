<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ferrugine</title>
    </head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="ltr" style="background-color: #f5f5f5; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
				<tbody>
                    <tr>
				        <td align="center" valign="top">
					        <div>
                                <p style="margin-top: 0;">
                                    <img src="https://www.ferrugine.com.br/static/locales/global/img/logo.png" alt="Ferrugine" style="border: none; display: inline; font-size: 14px; font-weight: bold; height: auto; line-height: 100%; outline: none; text-decoration: none; text-transform: capitalize;">
						        </p>
                            </div>
					        <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background-color: #fdfdfd; border: 1px solid #dcdcdc; border-radius: 3px !important;">
						        <tbody>
                                    <tr>
							            <td align="center" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #e63429; border-radius: 3px 3px 0 0 !important; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;">
                                                <tbody>
                                                    <tr>
                                                        <td id="header_wrapper" style="padding: 26px 20px; display: block;">
                                                            <h1 style="color: #ffffff; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 28px; font-weight: 800; line-height: 150%; margin: 0; text-align: center; text-shadow: 0 1px 0 #903d49; -webkit-font-smoothing: antialiased;">
                                                                {{ $subject }}
                                                            </h1>
                                                        </td>
										            </tr>
                                                </tbody>
                                            </table>
							            </td>
						            </tr>
				                    <tr>
                                        <td align="center" valign="top">
						                    <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
							                    <tbody>
                                                    <tr>
							                            <td valign="top" id="body_content" style="background-color: #fdfdfd;">
                                                            <!-- Content -->
							                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
								                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding: 48px 48px 18px 48px;">
									                                        <div id="body_content_inner" style="color: #737373; font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif; font-size: 14px; line-height: 150%; text-align: left;">
                                                                                <p style="margin: 0 0 16px;">Olá <b>{{ $usuario }}</b>, tudo bem?</p>

                                                                                <p style="margin: 0 0 16px;">{!! nl2br($mensagem[0]) !!}</p>

                                                                                <p style="margin: 0 0 16px; background: #f1f1f1; padding: 15px; border: 1px dashed #d4d4d4;">
                                                                                    <i>
                                                                                        {!! nl2br($mensagem[1]) !!}
                                                                                    </i>
                                                                                </p>

                                                                                <p style="margin: 0 0 16px;">{!! nl2br($mensagem[2]) !!}</p>

                                                                                <br/>
                                                                                <p style="margin: 0 0 16px;">
                                                                                    <small>*E-mail enviado automaticamente favor não respondê-lo.</small>
                                                                                </p>
                                                                            </div>
								                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
							                        </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
		                </td>
		            </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
