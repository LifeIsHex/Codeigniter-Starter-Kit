<!-- HTML for static distribution bundle build -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>

    <link href='<?php echo base_url(); ?>./application/modules/swagger/views/dist/swagger-ui.css' media='screen'
          rel='stylesheet'
          type='text/css'/>

    <link href='<?php echo base_url(); ?>./application/modules/swagger/views/dist/favicon-32x32.png' media='screen'
          rel='stylesheet'
          type='text/css'/>

    <link href='<?php echo base_url(); ?>./application/modules/swagger/views/dist/favicon-16x16.png' media='screen'
          rel='stylesheet'
          type='text/css'/>
    <style>
        html {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            margin: 0;
            background: #fafafa;
        }
    </style>
</head>

<body>
<div id="swagger-ui"></div>

<script src='<?php echo base_url(); ?>./application/modules/swagger/views/dist/swagger-ui-standalone-preset.js'
        type='text/javascript'></script>

<script src='<?php echo base_url(); ?>./application/modules/swagger/views/dist/swagger-ui-bundle.js'
        type='text/javascript'></script>

<script>
    //console.log('<?php //echo base_url(); ?>//');

    window.onload = function () {
        // Begin Swagger UI call region
        console.log(window.location.pathname);
        const ui = SwaggerUIBundle({
            // url: window.location.protocol + "//" + window.location.hostname + "/path-to-your-swagger.json",
            // url: "https://petstore.swagger.io/v2/swagger.json",
            // url: "swagger_test.json",
            url: "swagger_doc_generator.php",
            dom_id: '#swagger-ui',
            deepLinking: true,
            docExpansion: "none", // list, full, none
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            layout: "StandaloneLayout"
        })
        // End Swagger UI call region
        window.ui = ui
    }
</script>
</body>
</html>