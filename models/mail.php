<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Correos
{
    protected $correoDestinatario;
    protected $nombreDestinatario;
    protected $asuntoCorreo;

    /**
     * @return mixed
     */
    public function getCorreoDestinatario()
    {
        return $this->corrreoDestinatario;
    }

    /**
     * @param mixed $corrreoDestinatario
     *
     * @return self
     */
    public function setCorreoDestinatario($corrreoDestinatario)
    {
        $this->corrreoDestinatario = $corrreoDestinatario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreDestinatario()
    {
        return $this->nombreDestinatario;
    }

    /**
     * @param mixed $nombreDestinatario
     *
     * @return self
     */
    public function setNombreDestinatario($nombreDestinatario)
    {
        $this->nombreDestinatario = $nombreDestinatario;

        return $this;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getAsuntoCorreo()
    {
        return $this->asuntoCorreo;
    }

    /**
     * @param mixed $asuntoCorreo
     *
     * @return self
     */
    public function setAsuntoCorreo($asuntoCorreo)
    {
        $this->asuntoCorreo = $asuntoCorreo;

        return $this;
    }

    public function correoIndividual()
    {
        $correo = $this->getCorreoDestinatario();
        $nombre = $this->getNombreDestinatario();
        $asunto = $this->getAsuntoCorreo();
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = '	smtp.gmail.com'; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = ''; //SMTP username
            $mail->Password = ''; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $mail->Port = 465;

            $mail->setFrom('', 'CDR');
            $mail->addAddress($correo, $nombre);
            $mail->Subject = $asunto;
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body = $asunto . ' hoy a las ' . Utils::fechaCarbon(date('Y-m-d')) . ' Por favor no responder este correo.';
            $mail->send();
            return true;
        } catch (Exception $e) {
            $mail->send();
            echo $mail->ErrorInfo;
        }
    }

}
