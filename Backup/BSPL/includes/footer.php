    <script src="https://cdn.tiny.cloud/1/asyd3agz15pznlswi8v2543hqq6x6g1w7cambqah76u7bpiv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/backoffice.js"></script>

    <script>
    tinymce.init({
        selector: '#mytextarea',
        width: '600',
        height: '250'
    });

    $(document).ready(function(e) {
        const Initbackoffice = new backOffice();
    });
    </script>


</body>

</html>