<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <?php
        require_once 'assets/includes/autoload.php';
        require_once 'assets/core/script.php';
        if(!isset($_SESSION['user'])) header('location: index.php');
    ?>
</head>
<body class="">
    <nav class="sticky top-0 bg-white border-b border-slate-200 z-50">
        <div class="container mx-auto py-4">
            <div class="flex justify-between">
                <div class="flex">
                    <a href="" class="flex align-center">
                        <svg version="1.1" class="w-6 h-6 text-white m-0 " id="Icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                            <g>
                                <path d="M16,9c-3.9,0-7,3.1-7,7s3.1,7,7,7s7-3.1,7-7S19.9,9,16,9z"/>
                                <path d="M27.7,8.3C27.9,7.9,28,7.5,28,7c0-1.7-1.3-3-3-3c-0.5,0-0.9,0.1-1.3,0.3C21.4,2.8,18.8,2,16,2C8.3,2,2,8.3,2,16
                                    s6.3,14,14,14s14-6.3,14-14C30,13.2,29.2,10.6,27.7,8.3z M16,28C9.4,28,4,22.6,4,16S9.4,4,16,4c2.2,0,4.4,0.6,6.3,1.8
                                    C22.1,6.1,22,6.6,22,7c0,1.7,1.3,3,3,3c0.4,0,0.9-0.1,1.2-0.3c1.2,1.9,1.8,4,1.8,6.3C28,22.6,22.6,28,16,28z"/>
                            </g>
                        </svg>
                        <span class="self-center ml-1 text-xl font-semibold text-base md:text-xl">Dev Plannet</span>
                    </a>
                    <div class="relative hidden md:block mx-4">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Search icon</span>
                        </div>
                        <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search...">
                    </div>
                </div>
                <div class="flex">
                <form action="" method="" onsubmit="return false;" class="m-0 p-0 flex">
                    <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 hover:bg-gray-100 rounded-lg text-sm px-2.5 mr-1" >
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path class="text-black" fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                    <button  class="flex items-center gap-2 text-gray-500 hover:bg-gray-100 rounded-lg text-sm px-2.5 mr-1" >
                        <svg class="w-6 h-6" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25 25"><title>Write Message</title><path id="Write_Message" data-name="Write Message" d="M21,11h1V23.75A1.26,1.26,0,0,1,20.75,25H1.25A1.25,1.25,0,0,1,0,23.75V4.25A1.25,1.25,0,0,1,1.25,3H14V4H1.25A.25.25,0,0,0,1,4.25v19.5a.25.25,0,0,0,.25.25h19.5a.25.25,0,0,0,.25-.25ZM8.72,12.87,8,16.4a.5.5,0,0,0,.49.6h.1l3.5-.71a.5.5,0,0,0,.25-.14L22.68,5.82l-3.5-3.5L8.85,12.62A.5.5,0,0,0,8.72,12.87ZM24.54,1.75,23.25.46a1.56,1.56,0,0,0-2.2,0L19.88,1.61l3.5,3.5L24.54,4h0a1.56,1.56,0,0,0,0-2.2Z" fill="#0e1d25"/></svg>
                        <span>Write</span>
                    </button>
                    <button title="Mohamed Jamh" class=" text-gray-500 hover:bg-gray-100 rounded-lg text-sm px-2.5 mr-1">
                        <svg class="w-8 h-8" enable-background="new 0 0 500 500" id="Layer_1" version="1.1" viewBox="0 0 500 500" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><g><path d="M250,291.6c-52.8,0-95.8-43-95.8-95.8s43-95.8,95.8-95.8s95.8,43,95.8,95.8S302.8,291.6,250,291.6z M250,127.3    c-37.7,0-68.4,30.7-68.4,68.4s30.7,68.4,68.4,68.4s68.4-30.7,68.4-68.4S287.7,127.3,250,127.3z"/></g><g><path d="M386.9,401.1h-27.4c0-60.4-49.1-109.5-109.5-109.5s-109.5,49.1-109.5,109.5h-27.4c0-75.5,61.4-136.9,136.9-136.9    S386.9,325.6,386.9,401.1z"/></g></g></svg>
                    </button>
                </form>
                <form action="" method="POST" class="m-0 p-0 flex">
                    <button type="submit" name="logout" class="text-gray-500 hover:bg-red-200 hover:duration-1000 rounded-lg text-sm px-2.5 mr-1">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g id="Layer_77" data-name="Layer 77"><path d="M40.36,9.8a2,2,0,0,0-1.24,3.8C63.48,22,57.79,57.55,32,58a22.77,22.77,0,0,1-7.12-44.4,2,2,0,1,0-1.24-3.8A26.77,26.77,0,0,0,32,62C62.33,61.46,69,19.73,40.36,9.8Z"/><path d="M32,25.06a2,2,0,0,0,2-2V4a2,2,0,0,0-4,0V23.06A2,2,0,0,0,32,25.06Z"/></g></svg>
                    </button>
                </form>
                    
                </div>
            </div>
            <div>
                <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-search" aria-hidden="true">
                    <div class="relative mt-3 md:hidden">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search...">
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto">
        <div class="flex md:mx-20 lg:mx-28">
            <!-- <div id="statistics" class="flex items-center justify-around md:justify-start felx-wrap gap-1 w-100 max-h-fit py-3">
                <span class="bg-gray-100 text-gray-800 text-xs font-medium ml-1 rounded-full w-24 h-6 md:w-32 md:h-8 md:text-lg grid place-content-center">4 Users</span>    
                <span class="bg-gray-100 text-gray-800 text-xs font-medium ml-1 rounded-full w-24 h-6 md:w-32 md:h-8 md:text-lg grid place-content-center">4 Authors</span>    
                <span class="bg-gray-100 text-gray-800 text-xs font-medium ml-1 rounded-full w-24 h-6 md:w-32 md:h-8 md:text-lg grid place-content-center">4 Articles</span>    
                <span class="bg-gray-100 text-gray-800 text-xs font-medium ml-1 rounded-full w-24 h-6 md:w-32 md:h-8 md:text-lg grid place-content-center">4 Categories</span>    
            </div> -->
            <div class="articles flex flex-col gap-2">
                <a href="#" class="flex flex-col items-center bg-white border-b md:flex-row md:w-full hover:bg-gray-100 border-gray-700 bg-white hover:bg-gray-600 duration-700">
                    <img class="object-cover w-full h-96 md:h-auto md:w-48 md:rounded-none " src="https://flowbite.com/docs/images/blog/image-4.jpg" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <div>
                            <div id="author-profile" class="inline-block h-6 w-6 rounded-full text-white bg-slate-700 text-center">J</div>
                            <span id="author-name text-white text-2xl font-extralight">Author author</span>
                            <span id="article-date text-slate-500"></span>
                        </div>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400" title="Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order....</p>
                    </div>
                </a>
            </div>
            <aside class="sticky top-0 w-60 hidden lg:block h-max">
                <div class="flex flex-col gap-2 items-center py-5">
                    <span class="bg-gray-800 text-gray-100 text-xs font-extralight ml-1 rounded-full w-48 h-10 md:text-lg grid place-content-center">4 Users</span>    
                    <span class="bg-gray-800 text-gray-100 text-xs font-extralight ml-1 rounded-full w-48 h-10 md:text-lg grid place-content-center">4 Authors</span>    
                    <span class="bg-gray-800 text-gray-100 text-xs font-extralight ml-1 rounded-full w-48 h-10 md:text-lg grid place-content-center">4 Articles</span>    
                    <span class="bg-gray-800 text-gray-100 text-xs font-extralight ml-1 rounded-full w-48 h-10 md:text-lg grid place-content-center">4 Categories</span> 
                </div>
            </aside>
        </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>
    <script>
        $.get("assets/core/script.php",{ addArtcl : true}, function(data,status){}, 'json');
        // $.ajax({
        //     url: `assets/core/data.php`,
        //     dataType: "json",
        //     success: (data,status) => {
        //         console.log(data);
        //     }
        // });
    </script>
</body>
</html>