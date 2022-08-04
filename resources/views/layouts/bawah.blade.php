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
<script src="{{ asset('style/js/scripts.js') }}"></script>
<script src="{{ asset('style/js/custom.js') }}"></script>



{{--  <script src="{{ asset('style/js/jquery.min.js') }}"></script>  --}}
<script src="{{ asset('style/js/pdfobject.min.js') }}"></script>

{{-- script edit X- EDITABLE --}}
{{-- <script src="{{ asset('style/js/jqueryui-editable.min.js') }}"></script>
<script src="{{ asset('style/js/jqueryui-editable.js') }}"></script> --}}
{{--  <script src="{{ asset('style/js/bootstrap-editable.js') }}"></script>  --}}
{{-- <script src="{{ asset('style/js/jquery-editable-poshytip.min.js') }}"></script> --}}
{{-- <script src="{{ asset('style/js/jquery-editable-poshytip.js') }}"></script> --}}



{{-- end --}}

{{-- <script>
    var viewer = $('#viewpdf');
    PDFObject.embed('');
</script --}}
{{--  <script>
    $(document).ready(function(){
        $('.mk').editable({
            mode:'inline',
         });

    });
</script>  --}}

{{-- <script>
    let data = []

    function ambilDataMasterItem(){
        const url = "{{url('list_master_item') }}";
        $.ajax({
            url,
            success:function(list_master_item){
                console.log(list_master_item)
                //variabel utk nampugn nilai
                let tampilan = ``;
                $("#table-list tbody").children().remove()

                //looping
                for(let i=0;i<list_master_item.length;i++){

                    tampilan+= `
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
            error:function(e){
                console.log(e)
                alert("Terjadi Kesalahan")
            }
        })
    }
    ambilDataMasterItem()

    //form submit
    $("#form").on('submit', function(event){
        event.preventDefault()
        submitForm()
    })

    function submitForm(){
        let form = $("form");
         //post route WEB.PHP
        const url = "{{url('master_item') }}";
        $.ajax({
            url,
            method:"POST",
            data:form.serialize(),
            success:function(response){
               ambilDataMasterItem()

            },
            error:function(err){
                console.log(err)
                alert("gagal menambahkan")
            }
        })
    }
    $(document).ready(function () {

        $('body').on('click', '#editCompany', function (event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get(id + '/edit', function (data) {
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

</script> --}}

<script>
    let data = []

    function ambilDataMasterItem(){
        const url = "{{url('list_master_item') }}";
        $.ajax({
            url,
            success:function(list_master_item){
                console.log(list_master_item)
                //variabel utk nampugn nilai
                let tampilan = ``;
                $("#table-list tbody").children().remove()

                //looping
                for(let i=0;i<list_master_item.length;i++){

                    tampilan+= `
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
    $("#form").on('submit', function(event){
        event.preventDefault()
        submitForm()
    })

    function submitForm(){
        let form = $("form");
         //post route WEB.PHP
        const url = "{{url('master_item') }}";
        $.ajax({
            url,
            method:"POST",
            data:form.serialize(),
            success:function(response){
               ambilDataMasterItem()

            },
            error:function(err){
                console.log(err)
                alert("gagal menambahkan")
            }
        })
    }
    $(document).ready(function () {

        $('body').on('click', '#editCompany', function (event) {

            event.preventDefault();
            var id = $(this).data('id');
            $.get(id + '/edit', function (data) {
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
