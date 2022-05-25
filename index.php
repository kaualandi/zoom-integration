<!DOCTYPE html>

<head>
    <title>ZOOM SDK</title>
    <meta charset="utf-8" />
    <!-- <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.5/css/bootstrap.css" /> -->
    <!-- <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.5/css/react-select.css" /> -->
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <!-- LOGIN do Zoom -->
        <div class="modal fade" id="enterSectionZoom" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="enterSectionZoomLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="enterSectionZoomLabel">Inicie a sessão:</h5>
                    </div>
                    <div class="modal-body">
                        <div id="error-modal" class="alert alert-danger" role="alert"></div>
                        <div id="leave-modal" class="alert alert-info" role="alert">
                            Você saiu da chamada anterior, obrigado por sua presença.
                        </div>
                        <form class="navbar-form navbar-right" id="meeting_form">
                            <div class="form-group">
                                <input type="text" name="userName" id="userName" maxLength="100" placeholder="Seu nome*" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="meetingNumber" id="meetingNumber" value="" maxLength="200" placeholder="ID da reunião*" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="meetingPassword" id="meetingPassword" value="" maxLength="32" placeholder="Senha da reunião" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="userEmail" id="userEmail" value="" maxLength="32" placeholder="Seu e-mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="meetingRole" class="sdk-select">
                                    <option value=0>Participante</option>
                                    <option value=1>Anfitrião</option>
                                    <option value=5>Assistente</option>
                                </select>
                            </div>
                            <input type="hidden" id="meeting_lang" value="pt-BR" />
                            <input type="hidden" id="meeting_china" value="0" /> <!-- Global-->
                            <input type="hidden" value="" id="copy_link_value" />
                            <button type="submit" class="btn btn-primary" id="join_meeting">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://source.zoom.us/1.9.5/lib/vendor/react.min.js"></script>
    <script src="https://source.zoom.us/1.9.5/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.5/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.5/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.5/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/zoom.js"></script>
</body>

</html>