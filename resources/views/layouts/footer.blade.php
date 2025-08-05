<div id="loading">
    <div class="spinner"></div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(window).on('load', function() {
        $('#loading').fadeOut();
    })

    $(document).ready(function() {
        $('#loading').fadeIn(); // Show the loading spinner when the document is ready
    });
</script>
@stack('scripts')
</body>

</html>
