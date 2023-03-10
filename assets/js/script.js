var formCounter = 2;
var articleDropDownIdCounter = 1;


$.post("assets/core/script.php",{ getStatistics : true}, function(data,status){setStatistics(data)},"json");
$.post("assets/core/script.php",{ authores : true}, function(data,status){fillDropDowns(data,"authores")},"json");
$.post("assets/core/script.php",{ categories : true}, function(data,status){fillDropDowns(data,"categories")},"json");
function login(){
    let email = $('#email').val()
    let password = $('#password').val()
    if(email != "" || password != ""){
        $.post("assets/core/script.php",{ login : true , adress : email , passcode : password},function(data,status){
            if(data === "true"){
                window.location.href = "/planet-dev/";
            }else{
                $('#alert-wrapper').toggleClass('hidden');
                $('#alert-wrapper #alert-container').text(`Alert ! ${data}`);
            }
        });
    }else{
        $('#alert-wrapper').toggleClass('hidden');
        $('#alert-wrapper #alert-container').text(`Alert ! All fields are required`);
    }
}
function setStatistics(stats){
    $('.users-stats').html('Users '+stats['userCount'])
    $('.authors-stats').html('Authors '+stats['authorCount'])
    $('.articles-stats').html('Articles '+stats['articleCount'])
    $('.categories-stats').html('Categories '+stats['categorieCount'])
}
function listArticles(orderBy = "id_article", listOrder = "asc"){
    $.post("assets/core/script.php",{ list : true, order_by: orderBy , order : listOrder}, function(articles,status){
        $('#articles').empty();
        for(article of articles){
            let articleDiv = `
                    <div id="article-${article['id_article']}" class="py-5 flex flex-col items-center border-b md:flex-row md:w-full border-gray-300 bg-white">
                        <img class="object-cover h-80 w-full md:h-48 md:w-48 md:rounded-none " src="" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal w-full">
                            <div class="flex justify-between gap-2 w-full">
                                <div>
                                    <div id="" class="author-profile inline-block h-6 w-6 rounded-full text-white bg-slate-700 text-center font-extralight">${article['author_name'][0]}</div>
                                    <span id="" class="author-name text-base">${article['author_name']}</span>
                                    <span id="" class="article-date text-slate-500 text-xs">${article['date']}</span>
                                </div>
                                <div>
                                    <button id="dropdownMenuIconHorizontalButton-${articleDropDownIdCounter}" data-dropdown-toggle="dropdownDotsHorizontal-${articleDropDownIdCounter}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50" type="button"> 
                                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                    </button>
    
                                    <!-- Dropdown menu -->
                                    <div id="dropdownDotsHorizontal-${articleDropDownIdCounter}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                                        <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownMenuIconHorizontalButton-${articleDropDownIdCounter}">
                                            <li>
                                                <a onclick="listArticleInfo(${article['id_article']});" data-modal-target = "extralarge-modal-2"  data-modal-toggle="extralarge-modal-2" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                            </li>
                                            <li>
                                                <a onclick="prepareArticleToDelete(${article['id_article']});" data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="block px-4 py-2 hover:bg-gray-100 ">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <h5 class="article-title mb-2 text-2xl font-bold tracking-tight text-gray-900">${article['title']}</h5>
                            <p class="article-content mb-3 font-normal text-gray-700 " title="">${article['content'].substr(0,110)}....</p>
                            <div>
                                <span class="article-cat bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full ">${article['cat_name']}</span>
                                <span class="text-slate-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded">
                                    <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    <span id="">${article['read_time']} min read</span>
                                </span>
                            </div>
                        </div>
                    </div>
            `
            $('#articles').append(articleDiv);
            articleDropDownIdCounter++
        }
    },"json");
}
function listArticleInfo(idArticle){
    $.post("assets/core/script.php",{ id_article : idArticle }, function(data,status){
        $('#extralarge-modal-2 #update-article-btn').attr("onclick",`updateArticle(${idArticle});`)
        $('#extralarge-modal-2 .article-title').val(`${data[0]['title']}`)
        $('#extralarge-modal-2 .article-content').val(`${data[0]['content']}`)
        $('#extralarge-modal-2 .article-categorie').val(`${data[0]['id_categorie']}`);
        $('#extralarge-modal-2 .author').val(`${data[0]['id_author']}`);
    },"json");
}
function prepareArticleToDelete(idArticle){
    $('#delete-modal #delete-article-btn').attr("onclick",`deleteArticle(${idArticle});`)
}
function updateArticle(idArticle){

    let isValid = true
    let inputs = $('#extralarge-modal-2 form input , #extralarge-modal-2 form textarea , #extralarge-modal-2 form select')
    for (let index = 0; index < inputs.length; index++) {
        if(inputs[index].value == ""){
            isValid = false
        }
    }
    if(isValid){
        let updatedArticle = {}
        updatedArticle['id_article'] = idArticle;
        updatedArticle['title'] = $('#extralarge-modal-2 .article-title').val()
        updatedArticle['content'] = $('#extralarge-modal-2 .article-content').val()
        updatedArticle['read_time'] = Math.round((updatedArticle['content'].split(' ').length)/200)
        updatedArticle['id_categorie'] = $('#extralarge-modal-2 .article-categorie').val();
        updatedArticle['id_author'] = $('#extralarge-modal-2 .author').val();
        $.post("assets/core/script.php",{ updatedArticle : JSON.stringify(updatedArticle)})
        listArticles();
    }else{
        $('#alert').toggleClass('hidden');
        $('#alert .alert-container').text('All fields are required');
    }
}
function deleteArticle(idArticle){
    $.post("assets/core/script.php",{ deletedArticle : idArticle })
    listArticles();
}
function fillDropDowns(data,choice){
    for(d of data){
        let option = ``
        switch(choice) {
            case "categories":
                option = `<option value="${d['id_categorie']}">${d['name']}</option>`
                categorieAnker = `
                    <a id="categorie-btn-${d['id_categorie']}" onclick="filterByCat('${d['name']}');$(this).toggleClass('active');" class="cursor-pointer px-4 py-2 text-sm font-medium text-gray-900 bg-white border-b border-gray-200 hover:bg-gray-100 ">
                        ${d['name']}
                    </a>
                `
                $('#categorie-container .wrapper').append(categorieAnker)
                $('.article-categorie').append(option)
              break;
            case "authores":
                option = `<option value="${d['id_author']}">${d['full_name']}</option>`
                $('.author').append(option)
        }
    }
}
function filterByCat(categorieName){
    $('#categorie-container div .active').toggleClass('active');
    $(".article-cat").filter(function() {
        $(this).parent().parent().parent().toggle($(this).text().toLowerCase().indexOf(categorieName.toLowerCase()) > -1)
    });
}
function resetCategorie(){
    $('#categorie-container div .active').toggleClass('active');
    $('#articles > div').css('display','flex')
}
function formDuplicate(){
    let headerdiv = `
        <div class="flex justify-end" onclick="deleteArticleForm('form-${formCounter}');$(this).remove();">
            <button type="button" class="hover:bg-red-300 hover:duration-700 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                Remove Article Form
            </button>
        </div>
    `
    $('#form-container')
    .append(headerdiv)
    .append($('#article-form-1').clone().trigger("reset").attr("id","article-form-"+formCounter))
    formCounter++
}
function deleteArticleForm(formId){
    $('#'+formId).remove();
}
function addArticles(){
    let allForms = []
    let formContainer = $('#form-container form');
    for (let i = 0; i < formContainer.length; i++){
        formObj = {}
        let formData = new FormData(formContainer.get(i))
        for (const [key, value] of formData) {
            if(value == ""){
                $('#alert').toggleClass('hidden');
                $('#alert .alert-container').text('All fields are required');
                return 
            }
            formObj[`${key}`] = value
        }
        let date = new Date()
        formObj['date'] = date.getFullYear()+"/"+date.getMonth()+1+"/"+date.getDate()
        formObj['read_time'] = Math.round((formObj['content'].split(' ').length)/200)
        allForms.push(formObj);
    }
    $.post("assets/core/script.php",{ addedArticles : JSON.stringify(allForms)}, function(data,status){},"json");
}
listArticles();


$("#search-navbar , #search-navbar-2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".article-title").filter(function() {
        $(this).parent().parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});