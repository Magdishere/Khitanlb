<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{asset('admin-assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{asset('admin-assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{asset('admin-assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{asset('admin-assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{asset('admin-assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('admin-assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{asset('admin-assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{asset('admin-assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{asset('admin-assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{asset('admin-assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{asset('admin-assets/js/eva-icons.min.js')}}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{asset('admin-assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{asset('admin-assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{asset('admin-assets/plugins/side-menu/sidemenu.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            width: '100%' // Set the desired width, can be in pixels or percentage
        });
    });
</script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('91b7ac88e04f9dae10f5', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });

    window.Echo.private('order-channel')
        .listen('.OrderPlacedEvent', (e) => {
            // Update the notification count
            let countElement = document.getElementById('notification-count');
            let count = parseInt(countElement.innerText);
            count++;
            countElement.innerText = count;

            // Add a new notification item to the list
            let listElement = document.getElementById('notification-list');
            let newItem = document.createElement('a');
            newItem.classList.add('d-flex', 'p-3', 'border-bottom');
            newItem.href = '#';
            newItem.innerHTML = `
            <div class="notifyimg bg-warning">
                <i class="la la-bell text-white"></i>
            </div>
            <div class="mr-3">
                <h5 class="notification-label mb-1">${e.notification.title}</h5>
                <div class="notification-subtext">${e.notification.time}</div>
            </div>
            <div class="mr-auto" >
                <i class="las la-angle-left text-left text-muted"></i>
            </div>
        `;
            listElement.insertBefore(newItem, listElement.firstChild);
        });

</script>


