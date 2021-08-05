@extends('Layout.app')


@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4">
           <div class="card">
               <div class="card-body">
                    <input type="file" id="FileID" class="form-control">
                    <button onClick="onUpload()" id="UploadBtnID" class="btn btn-primary btn-block my-3"> Upload</button>
               </div>
           </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
    function onUpload(){
        let spinnerLod = "<div class='spinner-border text-white shadow-sm' role='status'></div>"
        $('#UploadBtnID').html(spinnerLod)
       let myfile = document.getElementById('FileID').files[0];
    //    let myfilename = myfile.name;
    //    let myfilesize = myfile.size;
    //    let myfileex = myfilename.split('.').pop();
    //    alert(myfileex)


        let FileData = new FormData;
        FileData.append('Filekey',myfile);

        let config = {header:{'content-type':'multipart/formdata'}}

        let url = '/fileUp'


        axios.post(url,FileData,config)
        .then(function (response) {
            if(response.status==200){
                $('#UploadBtnID').html('Upload Success')
                setTimeout(function(){
                    $('#UploadBtnID').html('Upload');
                }, 3000);

            }else{
                $('UploadBtnID').html('Upload Fail')
                setTimeout(function(){
                    $('#UploadBtnID').html('Upload');
                }, 3000);
            }
        })
        .catch(function (error) {
            $('UploadBtnID').html('Upload Fail')
                setTimeout(function(){
                    $('#UploadBtnID').html('Upload');
                }, 3000);
        })
    }
</script>
@endsection
