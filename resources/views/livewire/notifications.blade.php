<div>
    @if ($notification)
    <?php
        switch ($this->notification['status']) {
            case "success":
                $statusicon = "fa-check";
                $statuscolor = "text-green-500";
                break;
            case "info":
                $statusicon = "fa-info";
                $statuscolor = "text-blue-500";
                break;
            case "error":
                $statusicon = "fa-xmark";
                $statuscolor = "text-red-500";
                break;
        }
    ?>

        <div id="notification" class="notification font-family flex p-4 items-center w-full max-w-xs text-gray-500 bg-white rounded-lg shadow">
            
            <i class="fa-solid {{ $statusicon }} {{ $statuscolor }}"></i>
            <p class="ml-3 text-sm">{{ $notification['title'] }}</p>
        </div>

        <script>
            setTimeout(function() {
                var notification = document.getElementById('notification');
                if (notification) {
                    notification.style.display = 'none';
                }
            }, {{ $notification['timer'] }});
        </script>

        <style>
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;    
                z-index: 9999; /* Ensures notification stays on top */
                transition: opacity 0.5s ease-in-out; /* Animation for fading out */
                opacity: 1; /* Initial opacity for full visibility */
            }
        </style>
    @endif
</div>
