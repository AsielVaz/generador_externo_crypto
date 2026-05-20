<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Archivo Key de Pago â€” CRYPTO EFECTIVO</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, Helvetica, sans-serif; color:#1a2332; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%;">

<!-- Preheader oculto -->
<div style="display:none; max-height:0px; overflow:hidden; mso-hide:all; font-size:1px; line-height:1px; color:#f4f6f9;">
Tu archivo key para el pago #{{ $paymentId }} por ${{ number_format((float) $amount, 2) }} ha sido generado correctamente. DescÃ¡rgalo ahora.
</div>

<!-- Contenedor principal -->
<table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f6f9;">
  <tr>
    <td align="center" style="padding:24px 12px 24px 12px;">

      <!-- Tabla 600px -->
      <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px; max-width:600px; background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(13,27,42,0.08);">

        <!-- ======= HEADER ======= -->
        <tr>
          <td style="background-color:#0D1B2A; padding:32px 32px 28px 32px;" align="center">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td align="center" style="padding-bottom:12px;">
                  <img src="https://cryptoefectivo.com/logo.svg" width="320" alt="CRYPTO EFECTIVO â€” Efectivo encriptado, seguro y confiable" style="display:block; width:320px; max-width:100%; height:auto; border:0; outline:none; text-decoration:none;" />
                </td>
              </tr>
              <tr>
                <td align="center" style="padding-top:8px;">
                  <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; letter-spacing:2px; color:#5891C7; text-transform:uppercase;">
                    Entrega de Archivo de ValidaciÃ³n de Pago
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= FRANJA INSTITUCIONAL ======= -->
        <tr>
          <td style="background-color:#ffffff; padding:20px 32px 16px 32px; border-bottom:1px solid #e8ecf2;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td align="center" style="padding-bottom:8px;">
                  <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; letter-spacing:1.5px; color:#8895a8; text-transform:uppercase;">
                    En colaboraciÃ³n con
                  </p>
                </td>
              </tr>
              <tr>
                <td>
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td width="50%" align="center" valign="middle" style="padding:6px 12px;">
                        <img src="https://cryptoefectivo.com/imet.png" width="200" alt="IMET â€” Instituto Mexicano de Transparencia" style="display:block; width:200px; max-width:100%; height:auto; border:0; outline:none; text-decoration:none;" />
                      </td>
                      <td width="50%" align="center" valign="middle" style="padding:6px 12px;">
                        <img src="https://edworld.mx/logo.png" width="140" alt="EDWORLD â€” Soluciones Administrativas Integrales, S.C." style="display:block; width:140px; max-width:100%; height:auto; border:0; outline:none; text-decoration:none; border-radius:6px;" />
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= SALUDO ======= -->
        <tr>
          <td style="padding:36px 36px 8px 36px;">
            <p style="margin:0 0 6px 0; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:1.55; color:#1a2332;">
              Hola, <strong>{{ $participantName }}</strong>
            </p>
            <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:15px; line-height:1.55; color:#3a4555;">
              Tu archivo <strong style="font-family:&#39;Courier New&#39;, Courier, monospace;">.10hf</strong> de validaciÃ³n de pago ha sido generado correctamente y ya estÃ¡ disponible para su descarga.
            </p>
          </td>
        </tr>

        <!-- ======= TARJETA PRINCIPAL DEL PAGO ======= -->
        <tr>
          <td style="padding:20px 36px 8px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#0D1B2A; border-radius:8px;">
              <tr>
                <td style="padding:24px 28px 20px 28px;">

                  <!-- NÃºmero de pago -->
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="border-bottom:1px solid #1d2d42; padding-bottom:16px; margin-bottom:0;">
                    <tr>
                      <td style="padding-bottom:16px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; letter-spacing:1.5px; color:#5891C7; text-transform:uppercase;">
                          NÃºmero de pago
                        </p>
                        <p style="margin:0; font-family:&#39;Courier New&#39;, Courier, monospace; font-size:22px; font-weight:bold; color:#ffffff; letter-spacing:2px;">
                          #{{ $paymentId }}
                        </p>
                      </td>
                    </tr>
                  </table>

                  <!-- Monto y fecha en dos columnas -->
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td width="50%" valign="top" style="padding-top:16px; padding-right:12px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; letter-spacing:1.5px; color:#5891C7; text-transform:uppercase;">
                          Monto
                        </p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:26px; font-weight:bold; color:#ffffff;">
                          ${{ number_format((float) $amount, 2) }}
                        </p>
                        <p style="margin:2px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#6a7a8c;">
                          MXN
                        </p>
                      </td>
                      <td width="50%" valign="top" style="padding-top:16px; padding-left:12px; border-left:1px solid #1d2d42;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; letter-spacing:1.5px; color:#5891C7; text-transform:uppercase;">
                          Fecha de generaci&#243;n
                        </p>
                        <p style="margin:0; font-family:&#39;Courier New&#39;, Courier, monospace; font-size:14px; font-weight:bold; color:#ffffff; line-height:1.5;">
                          {{ $generatedAt }}
                        </p>
                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= NOMBRE DEL ARCHIVO ======= -->
        <tr>
          <td style="padding:16px 36px 8px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f7fb; border:1px solid #d8e1ec; border-radius:6px;">
              <tr>
                <td style="padding:14px 20px;">
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <td valign="middle" width="32">
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:24px; line-height:1;">&#128274;</p>
                      </td>
                      <td valign="middle" style="padding-left:10px;">
                        <p style="margin:0 0 2px 0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; letter-spacing:1.2px; color:#5891C7; text-transform:uppercase;">
                          Archivo de validaci&#243;n
                        </p>
                        <p style="margin:0; font-family:&#39;Courier New&#39;, Courier, monospace; font-size:13px; font-weight:bold; color:#0D1B2A; word-break:break-all;">
                          {{ $filename }}
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= BOTÃ“N DE DESCARGA ======= -->
        <tr>
          <td style="padding:16px 36px 8px 36px;" align="center">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" style="background-color:#5891C7; border-radius:6px;">
                  <a href="{{ $downloadUrl }}" target="_blank" style="display:inline-block; padding:16px 40px; font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; color:#ffffff; text-decoration:none; letter-spacing:0.5px;">
                    &#11015;&#65039;&nbsp; Descargar archivo .10hf
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- URL en texto plano como fallback -->
        <tr>
          <td style="padding:8px 36px 4px 36px;" align="center">
            <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#8895a8;">
              Si el bot&#243;n no funciona, copia y pega el siguiente enlace en tu navegador:
            </p>
          </td>
        </tr>
        <tr>
          <td style="padding:4px 36px 20px 36px;" align="center">
            <p style="margin:0; font-family:&#39;Courier New&#39;, Courier, monospace; font-size:11px; color:#5891C7; word-break:break-all;">
              {{ $downloadUrl }}
            </p>
          </td>
        </tr>

        <!-- Separador -->
        <tr>
          <td style="padding:0 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td style="border-top:1px solid #e8ecf2; line-height:1px; font-size:1px;">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= INSTRUCCIONES DE USO ======= -->
        <tr>
          <td style="padding:24px 36px 8px 36px;">
            <h2 style="margin:0 0 10px 0; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bold; color:#0D1B2A;">
              Â¿C&#243;mo utilizar tu archivo?
            </h2>
            <p style="margin:0 0 16px 0; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:1.55; color:#3a4555;">
              Sigue estos pasos para validar tu pago en la plataforma <strong>CRYPTO EFECTIVO</strong>:
            </p>
          </td>
        </tr>

        <!-- Pasos de uso -->
        <tr>
          <td style="padding:0 36px 8px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">

              <!-- Paso A -->
              <tr>
                <td style="padding-bottom:12px;">
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f7fb; border-radius:6px;">
                    <tr>
                      <td valign="top" width="48" style="padding:14px 0 14px 16px;">
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; color:#ffffff; background-color:#0D1B2A; width:28px; height:28px; line-height:28px; border-radius:14px; text-align:center;">A</p>
                      </td>
                      <td valign="middle" style="padding:14px 16px 14px 8px;">
                        <p style="margin:0 0 2px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold; color:#0D1B2A;">
                          Descarga el archivo
                        </p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:1.45; color:#5a6678;">
                          Haz clic en el bot&#243;n de descarga o usa el enlace directo. Guarda el archivo <span style="font-family:&#39;Courier New&#39;, Courier, monospace; background-color:#e8ecf2; padding:1px 5px; border-radius:3px;">.10hf</span> en un lugar seguro.
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- Paso B -->
              <tr>
                <td style="padding-bottom:12px;">
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f7fb; border-radius:6px;">
                    <tr>
                      <td valign="top" width="48" style="padding:14px 0 14px 16px;">
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; color:#ffffff; background-color:#0D1B2A; width:28px; height:28px; line-height:28px; border-radius:14px; text-align:center;">B</p>
                      </td>
                      <td valign="middle" style="padding:14px 16px 14px 8px;">
                        <p style="margin:0 0 2px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold; color:#0D1B2A;">
                          Ingresa a la plataforma CRYPTO EFECTIVO
                        </p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:1.45; color:#5a6678;">
                          Inicia sesi&#243;n con el correo <strong style="color:#0D1B2A;">{{ $toEmail }}</strong> con el que te diste de alta en el sistema.
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- Paso C -->
              <tr>
                <td style="padding-bottom:12px;">
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f7fb; border-radius:6px;">
                    <tr>
                      <td valign="top" width="48" style="padding:14px 0 14px 16px;">
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:18px; font-weight:bold; color:#ffffff; background-color:#0D1B2A; width:28px; height:28px; line-height:28px; border-radius:14px; text-align:center;">C</p>
                      </td>
                      <td valign="middle" style="padding:14px 16px 14px 8px;">
                        <p style="margin:0 0 2px 0; font-family:Arial, Helvetica, sans-serif; font-size:13px; font-weight:bold; color:#0D1B2A;">
                          Carga el archivo y valida tu inscripci&#243;n
                        </p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:1.45; color:#5a6678;">
                          En la secci&#243;n de validaci&#243;n de pagos, carga el archivo <span style="font-family:&#39;Courier New&#39;, Courier, monospace; background-color:#e8ecf2; padding:1px 5px; border-radius:3px;">.10hf</span>. El sistema confirmar&#225; autom&#225;ticamente el pago del taller o talleres a los que te inscribiste, conforme a las reglas operativas de cada uno.
                        </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            </table>
          </td>
        </tr>

        <!-- ======= AVISO DE SEGURIDAD ======= -->
        <tr>
          <td style="padding:8px 36px 24px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#fff4e5; border:2px solid #f5a623; border-radius:6px;">
              <tr>
                <td style="padding:14px 18px;">
                  <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; letter-spacing:1px; color:#b76e00; text-transform:uppercase;">
                    &#9888;&#65039;&nbsp; Aviso de seguridad
                  </p>
                  <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:13px; line-height:1.5; color:#7a4a00;">
                    Este archivo es de <strong>uso personal e intransferible</strong>. EstÃ¡ vinculado exclusivamente a tu registro y nÃºmero de pago. No lo compartas con terceros. Si no reconoces este pago, por favor notifÃ­calo de inmediato a <strong>facturacion2@edworld.mx</strong>.
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Separador -->
        <tr>
          <td style="padding:0 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td style="border-top:1px solid #e8ecf2; line-height:1px; font-size:1px;">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= RESUMEN DEL FLUJO ======= -->
        <tr>
          <td style="padding:20px 36px 24px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%" style="background-color:#f4f7fb; border-radius:8px;">
              <tr>
                <td style="padding:16px 20px;">
                  <p style="margin:0 0 12px 0; font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; letter-spacing:1.5px; color:#5891C7; text-transform:uppercase; text-align:center;">
                    Estado actual de tu proceso
                  </p>
                  <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
                    <tr>
                      <!-- Paso 1 tachado -->
                      <td align="center" valign="middle" width="22%" style="padding:4px 2px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:1; color:#a8b8cc;">&#10003;</p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#a8b8cc; text-decoration:line-through;">Transferencia</p>
                      </td>
                      <td align="center" valign="middle" width="6%" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a8b8cc; font-weight:bold;">&rarr;</td>
                      <!-- Paso 2 tachado -->
                      <td align="center" valign="middle" width="22%" style="padding:4px 2px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:1; color:#a8b8cc;">&#10003;</p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#a8b8cc; text-decoration:line-through;">Comprobante</p>
                      </td>
                      <td align="center" valign="middle" width="6%" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#a8b8cc; font-weight:bold;">&rarr;</td>
                      <!-- Paso 3 ACTIVO -->
                      <td align="center" valign="middle" width="22%" style="padding:4px 2px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:1; color:#5891C7;">&#128274;</p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#0D1B2A;">&#9654; .10hf listo</p>
                      </td>
                      <td align="center" valign="middle" width="6%" style="font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#d8e1ec; font-weight:bold;">&rarr;</td>
                      <!-- Paso 4 pendiente -->
                      <td align="center" valign="middle" width="16%" style="padding:4px 2px;">
                        <p style="margin:0 0 4px 0; font-family:Arial, Helvetica, sans-serif; font-size:20px; line-height:1; color:#d8e1ec;">&#127891;</p>
                        <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:10px; font-weight:bold; color:#c0cad8;">Validar</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- ======= FOOTER ======= -->
        <tr>
          <td style="background-color:#0D1B2A; padding:24px 36px 28px 36px;">
            <table role="presentation" border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td align="center" style="padding-bottom:10px;">
                  <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold; letter-spacing:1.5px; color:#5891C7; text-transform:uppercase;">
                    Crypto Efectivo &middot; IMET &middot; EDWORLD
                  </p>
                </td>
              </tr>
              <tr>
                <td align="center" style="padding-bottom:6px;">
                  <p style="margin:0; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:1.5; color:#a8b8cc;">
                    Instituto Mexicano de Transparencia &nbsp;&middot;&nbsp; EDWORLD Soluciones Administrativas Integrales, S.C.
                  </p>
                </td>
              </tr>
              <tr>
                <td align="center" style="padding-top:8px; border-top:1px solid #1d2d42;">
                  <p style="margin:10px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-size:10px; line-height:1.5; color:#6a7a8c;">
                    Este correo es un aviso autom&#225;tico del sistema. Si no reconoces esta transacci&#243;n, por favor notif&#237;calo a facturacion2@edworld.mx. &nbsp;&middot;&nbsp; No respondas a este mensaje directamente.
                  </p>
                </td>
              </tr>
            </table>
          </td>
        </tr>

      </table>
      <!-- Fin tabla 600px -->

    </td>
  </tr>
</table>

</body>
</html>

