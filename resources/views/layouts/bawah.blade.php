<!-- General JS Scripts -->
<script src="{{ asset('style/modules/jquery.min.js') }}"></script>
<script src="{{ asset('style/modules/popper.js') }}"></script>
<script src="{{ asset('style/modules/tooltip.js') }}"></script>
<script src="{{ asset('style/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('style/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('style/modules/moment.min.js') }}"></script>
<script src="{{ asset('style/js/stisla.js') }}"></script>
<script src="{{ asset('style/js/page/modules-toastr.js') }}"></script>
<script src="{{ asset('style/modules/izitoast/js/iziToast.min.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
{{-- <script src="{{ asset('style/js/scripts.js') }}"></script> --}}
<script src="{{ asset('style/js/custom.js') }}"></script>



{{-- <script src="{{ asset('style/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('style/js/pdfobject.min.js') }}"></script>

{{-- script edit X- EDITABLE --}}
{{-- <script src="{{ asset('style/js/jqueryui-editable.min.js') }}"></script>
<script src="{{ asset('style/js/jqueryui-editable.js') }}"></script> --}}
{{-- <script src="{{ asset('style/js/bootstrap-editable.js') }}"></script> --}}
{{-- <script src="{{ asset('style/js/jquery-editable-poshytip.min.js') }}"></script> --}}
{{-- <script src="{{ asset('style/js/jquery-editable-poshytip.js') }}"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
{{-- toast notif --}}
{{-- scan qr --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    // ajax


    $('#result').val('test');
    // function onScanSuccess(decodedText, decodedResult) {
    //     // alert(decodedText);
    //     $('#result').val(decodedText);
    //     let id = decodedText;
    //     html5QrcodeScanner.clear().then(_ => {
    //         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //         $.ajax({

    //             url: "{{ route('insert') }}",
    //             type: 'POST',
    //             data: {
    //                 _methode: "POST",
    //                 _token: CSRF_TOKEN,
    //                 qr_code: id
    //             },
    //             success: function(response) {
    //                 // console.log(response);
    //                 if (response.status == 200) {
    //                     alert('berhasil');
    //                 } else {
    //                     alert('gagal');
    //                 }

    //             }
    //         });
    //     }).catch(error => {
    //         alert('something wrong');
    //     });

    // }
    // function play() {
    //     var audio = new Audio(
    //         'https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3');
    //     // audio.play();
    // }


    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // var audio = $("#chatAudio").val();
        var audio = new Audio(
            'https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3');
        $('#result').val(decodedText);
        toastr.options.timeOut = 100;
        let id = decodedText;
        var ur_id = $("#ur").val();
        html5QrcodeScanner.clear().then(_ => {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({

                url: "{{ route('insert') }}",
                type: 'POST',
                data: {
                    _methode: "POST",
                    _token: CSRF_TOKEN,
                    qr_code: id
                },
                success: function(response) {
                    // console.log(response);
                    if (response.status == 200) {
                        alert('berhasil');
                        audio.play();

                    } else {
                        //  alert('Berhasil');
                        toastr.success('sukses');

                        audio.play();


                        window.location = '/detailkelasmahasiswa/' + ur_id;
                    }

                }
            });
        }).catch(error => {
            alert('something wrong');
        });
    }

    // function onScanFailure(error) {
    //     // handle scan failure, usually better to ignore and keep scanning.
    //     // for example:
    //     console.warn(`Code scan error = ${error}`);
    // }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess);
</script>
// and
<script>
    $(document).ready(function() {
        toastr.options.timeOut = 10000;
        @if (Session::has('error'))
            toastr.error('{{ Session::get('error') }}');
        @elseif (Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    });
</script>

<script>
    let data = []

    function ambilDataMasterItem() {
        const url = "{{ url('list_master_item') }}";
        $.ajax({
            url,
            success: function(list_master_item) {
                console.log(list_master_item)
                //variabel utk nampugn nilai
                let tampilan = ``;
                $("#table-list tbody").children().remove()

                //looping
                for (let i = 0; i < list_master_item.length; i++) {

                    tampilan += `
                    <tr>
                        <td>${list_master_item[i]. i++||'-'} </td>
                        <td>${list_master_item[i]. nama||'-'} </td>
                        <td>${list_master_item[i]. kelas||'-'} </td>
                        <td>${list_master_item[i]. updated_at||'-'} </td>
                    </tr>
                    `
                }
                //panggil
                $("#table-list tbody").append(tampilan)


            },
            // error:function(e){
            //     console.log(e)
            //     alert("Terjadi Kesalahan")
            // }
        })
    }
    ambilDataMasterItem()

    //form submit
    $("#form").on('submit', function(event) {
        event.preventDefault()
        submitForm()
    })

    function submitForm() {
        let form = $("form");
        //post route WEB.PHP
        const url = "{{ url('master_item') }}";
        $.ajax({
            url,
            method: "POST",
            data: form.serialize(),
            success: function(response) {
                ambilDataMasterItem()

            },
            error: function(err) {
                console.log(err)
                alert("gagal menambahkan")
            }
        })
    }
    $(document).ready(function() {

        $('body').on('click', '#editCompany', function(event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get(id + '/edit', function(data) {
                //$('#userCrudModal').html("Edit category");
                //$('#submit').val("Detail Dosen");
                $('#practice_modal').modal('show');
                $('#color_id').val(data.data.id);
                $('#name').val(data.data.nama_dosen);
                $('#alamat').val(data.data.alamat);
                $('#tmpL').val(data.data.tempat_lahir);
                $('#NIDN').val(data.data.NIDN);



            })
        })

    });
</script>





</body>

</html>
