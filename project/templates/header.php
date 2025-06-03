<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  
  <link rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" 
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" 
        crossorigin="anonymous">
  
  <link rel="stylesheet" 
        href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/styles.css">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        
        <a class="navbar-brand" 
           href="<?= $_SERVER['SCRIPT_NAME'] ?>">
          Articles
        </a>
        
        <button class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" 
                 aria-current="page" 
                 href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/hello/Dmitriy">
                Hello
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" 
                 href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/create">
                Create Article
              </a>
            </li>
          </ul>
        </div>
        
      </div>
    </nav>
  </header>

<main>
  <div class="container">
    