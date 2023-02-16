<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> WEB | {{ $title }}</title>


      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
     <!-- trix editor -->
     <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
     <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
 
     <style>
         trix-toolbar [data-trix-button-group="file-tools"]{
           display: none;
         }
     </style>

  </head>
  <body>
    
@include('dashboard.layouts.header')

<div class="container-fluid">
  <div class="row">
   @include('dashboard.layouts.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('container')
    </main>
  </div>
</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="/js/dashboard.js"></script>
  </body>

  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
          fetch('/dashboard/posts/checkSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
    });

    
   

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();

      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }


    }
    
  </script>
  <script>
    const name = document.querySelector('#name');
    const slugCategory = document.querySelector('#slugCategory');

    name.addEventListener('change', function(){
        fetch('/dashboard/categories/checkSlugCategory?name=' + name.value)
        .then(response => response.json())
        .then(data => slugCategory.value = data.slugCategory)
    });
</script>
</html>
