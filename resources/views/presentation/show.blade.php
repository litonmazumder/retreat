<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>{{ $presentation->eventSession->title }}</title>

<style>

html,
body{

    margin:0;
    width:100%;
    height:100%;
    overflow:hidden;

}

#placeholder{

    width:100%;
    height:100vh;

}

</style>

</head>

<body>

<div id="placeholder"></div>


<script src="http://192.168.1.225:8080/web-apps/apps/api/documents/api.js"></script>

<script>

const config = {

    document: {

        fileType: "{{ pathinfo($presentation->file_name, PATHINFO_EXTENSION) }}",

        key: "{{ md5($presentation->id.$presentation->updated_at) }}",

        title: "{{ $presentation->eventSession->title }}",

        url: "http://attendance-nginx/storage/presentations/{{ $presentation->file_name }}"

    },

    documentType: "slide",

    editorConfig: {

        mode: "view",

        lang: "en"

    }

};

console.log(config);

new DocsAPI.DocEditor("placeholder", config);

</script>

</body>

</html>