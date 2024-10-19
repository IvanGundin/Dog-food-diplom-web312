@if ($errors->has('auth_admin'))
    <div id="alert-message" class="alert-box">
        <div class="alert-content">
            <p>Неверный логин или пароль</p>
            <button id="alert-close-btn" class="alert-close">OK</button>
        </div>
    </div>
    <style>
        .alert-box {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .alert-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .alert-close {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .alert-close:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButton = document.getElementById('alert-close-btn');
            const alertMessage = document.getElementById('alert-message');
            closeButton.addEventListener('click', function() {
                alertMessage.style.display = 'none';
            });
            document.addEventListener('click', function(event) {
                if (event.target !== alertMessage && !alertMessage.contains(event.target)) {
                    alertMessage.style.display = 'none';
                }
            });
        });
    </script>
@endif