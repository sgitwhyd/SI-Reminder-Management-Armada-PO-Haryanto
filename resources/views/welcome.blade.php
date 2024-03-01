@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')

<div class="col-12">
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong>File upload</strong>
        </div>
        <div class="card-body">
            <div id="drag-drop-area">
            </div>
        </div> <!-- .card-body -->
    </div> <!-- .card -->
</div>

@endsection

@section('script')
<script>
    var uptarg = document.getElementById('drag-drop-area');
    const XHRUpload = Uppy.XHRUpload
    if (uptarg)
    {
      var uppy = Uppy.Core({
        id: 'uppy',
        autoProceed: false,
        allowMultipleUploads: true,
        debug: false,
        restrictions: {
            maxFileSize: null,
            minFileSize: null,
            maxTotalFileSize: null,
            maxNumberOfFiles: null,
            minNumberOfFiles: null,
            allowedFileTypes: ['image/*', 'video/*']
        },
        meta: {},
        onBeforeFileAdded: (currentFile, files) => currentFile,
        onBeforeUpload: (files) => { 
            alert('Upload now');
        },
        locale: {},
        // store: new DefaultStore(),
        // logger: justErrorsLogger,
        infoTimeout: 5000
        })
        .use(Uppy.Dashboard, {
            replaceTargetContent: true,
            showProgressDetails: true,
            // note: 'Images and video only, 2–3 files, up to 1 MB',
            metaFields: [
                { id: 'name', name: 'Name', placeholder: 'file name' },
                { id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' }
            ],
            browserBackButtonClose: false,
            inline: true,
            target: uptarg,
            proudlyDisplayPoweredByUppy: false,
            theme: 'dark',
            width: 1080,
            height: 470,
             
        })
        .use(XHRUpload, {
            // limit: 2,
            endpoint: "{{'uploads'}}",
            formData: true,
            fieldName: 'file_upload',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') 
                // from <meta name="csrf-token" content="{{ csrf_token() }}">
            }
        });
      uppy.on('complete', (result) =>
      {
        console.log('Upload complete! We’ve uploaded these files:', result.successful)
        alert('Upload complete');
        location.reload();
      });
    }
</script>


@endsection

