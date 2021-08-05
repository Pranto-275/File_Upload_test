@extends('Layout.app')


@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-md-4">
           <div class="card">
               <div class="card-body">
                    <input type="file" id="FileID" class="form-control">
                    <button onClick="onUpload()" id="UploadBtnID" class="btn btn-primary btn-block my-3"> Upload</button>

                    <table border="1" width="100%">
                        <tr>
                            <td> <h6 id="uploadpercentageid">00%</h6></td>
                            <td> <h6 id="uploadMBid">00</h6></td>
                            <td> <h6 id="uploadperMBid">00</h6></td>
                        </tr>
                    </table>
               </div>
           </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<script>
    function onUpload(){
        // let spinnerLod = "<div class='spinner-border text-white shadow-sm' role='status'></div>"
        // $('#UploadBtnID').html(spinnerLod)
       let myfile = document.getElementById('FileID').files[0];
    //    let myfilename = myfile.name;
    //    let myfilesize = myfile.size;
    //    let myfileex = myfilename.split('.').pop();
    //    alert(myfileex)


        let FileData = new FormData;
        FileData.append('Filekey',myfile);

        let config = {
        headers:{'content-type':'multipart/formdata'},
        onUploadProgress: function(progressEvent){
            let UploadPercentage = Math.round(((progressEvent.loaded*100)/progressEvent.total)) + "%"
            $('#uploadpercentageid').html(UploadPercentage)
            let UpMB= (progressEvent.loaded/(1024*1024)).toFixed(2) +" MB";
           let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";

           $('#uploadMBid').html(UpMB)
           $('#uploadperMBid').html(UpPer)
        }
        }


        let url = '/fileUp'


        axios.post(url,FileData,config)
        .then(function (response) {
            if(response.status==200){
                $('#uploadpercentageid').html('Upload Success')
                // $('#UploadBtnID').html('Upload Success')
                // setTimeout(function(){
                //     $('#UploadBtnID').html('Upload');
                // }, 3000);

                setTimeout(function(){
                    $('#uploadpercentageid').html('Upload Success')
                }, 2000);

            }else{
                // $('UploadBtnID').html('Upload Fail')
                // setTimeout(function(){
                //     $('#UploadBtnID').html('Upload');
                // }, 3000);
                setTimeout(function(){
                    $('#uploadpercentageid').html('Upload failed')
                }, 2000);
            }
        })
        .catch(function (error) {
            // $('UploadBtnID').html('Upload Fail')
            //     setTimeout(function(){
            //         $('#UploadBtnID').html('Upload');
            //     }, 3000);
            setTimeout(function(){
                    $('#uploadpercentageid').html('Upload failed')
                }, 2000);
        })
    }
</script>
@endsection
