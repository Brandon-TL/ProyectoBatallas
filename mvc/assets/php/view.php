<?php
    /**
     * Función para cambiar textos de las vistas
     * @param vista:vista vista que se quiere modificar
     * @param ruta:data ruta del diccionario que se quiere emplear
     */
    function data_replace (&$vista, $data) {
        // Cargar el diccionario correspondiente ($data)
        require $data;

        // Recorrer el diccionario para sustituir los textos configurables de la vista
        foreach ($dict as $key => $value) {
            $vista = str_replace('{'. $key .'}', $value, $vista);
        }

        // Devolver la vista con los textos rellenos
        return $vista;
    }
?>