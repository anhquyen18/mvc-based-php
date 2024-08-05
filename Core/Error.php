<?php

namespace Core;


class Error
{
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERROR) {
            echo "<h1?> Fatal error </h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p> Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' online" . $exception->getLine() . "</p>";
        } else {
            $log = dirname(__DIR__) . '/logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);

            $message = "<h1?> Fatal error </h1>";
            $message .= "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            $message .= "<p> Message: '" . $exception->getMessage() . "'</p>";
            $message .= "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>";
            $message .= "<p>Thrown in '" . $exception->getFile() . "' online" . $exception->getLine() . "</p>";

            error_log($message);
            // if ($code == 404) {
            // echo "<h1>Page not found </h1>";
            // } else {
            // echo "<h1>An error occurred</h1>";
            // }
            View::renderTemplate("$code.html");
        }
    }
}
