<template>
    <div>
        <h2>
            Articles
        </h2>
        <form @submit.prevent="addArticle" class="mb-3">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" v-model="article.title">
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" placeholder="Body" v-model="article.body"></textarea>
            </div>
            <button type="submit" class="btn btn-light btn-block">Save</button>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchArticles(pagination.prev_page_url)">Previous</a>
                </li>
                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{pagination.current_page}} of {{pagination.last_page}}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                    <a class="page-link" href="#" @click="fetchArticles(pagination.next_page_url)">Next</a>
                </li>
            </ul>
        </nav>
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{ article.title }}</h3>
            <p>{{ article.body }}</p>
            <hr>
            <button @click="editArticle(article)" class="btn btn-warning mb-2">edit</button>
            <button @click="deleteArticle(article.id)" class="btn btn-danger">delete</button>
        </div>
    </div>

</template>

<script>
    export default {
        name: "articles",
        data() {
            return {
                articles: [],
                article: {
                    id: '',
                    title: '',
                    body: ''
                },
                article_id: '',
                pagination: {},
                edit: false
            };
        },
        created() {
            this.fetchArticles();
        },
        methods:{
          fetchArticles(page_url){
              let vm = this;
              page_url = page_url || '/api/articles';
              fetch(page_url)
                  .then(res => res.json())
                  .then(res =>{
                    ///console.log(res.data);
                      this.articles = res.data;
                      vm.makePagination(res.meta, res.links);
              })
                  .catch(err => console.log(err));
          },
            makePagination(meta, links){
              let pagination = {
                  current_page: meta.current_page,
                  last_page:meta.last_page,
                  next_page_url: links.next,
                  prev_page_url: links.prev
              };
              console.log(pagination);
              this.pagination = pagination;
            },
            deleteArticle(id){
              if(confirm('are you sure?')){
                fetch(`api/article/${id}`,{method:'delete'})
                    .then(res => res.json())
                    .then(data => {
                        alert('article removed');
                        this.fetchArticles();
                    })
                    .catch(err =>console.log(err));
              }
            },
            addArticle(){
              console.log(this.edit);

              if(this.edit === false){
                  //add
                  fetch('api/article',{
                      method: 'post',
                      body : JSON.stringify(this.article),
                      headers:{
                          'content-type':'application/json'
                      }
                  })
                      .then(res => res.json())
                      .then(data =>{
                          this.article.title = '';
                          this.article.body = '';
                          alert('article added');
                          this.fetchArticles();
                      })
                      .catch(err => console.log(err));
              } else {
                  //update
                  fetch('api/article',{
                      method: 'put',
                      body : JSON.stringify(this.article),
                      headers:{
                          'content-type':'application/json'
                      }
                  })
                      .then(res => res.json())
                      .then(data =>{
                          this.edit = false;
                          this.article = {
                              id: '',
                              title: '',
                              body: ''
                          };
                          alert('article updated');
                          this.fetchArticles();
                      })
                      .catch(err => console.log(err));
                  /*this.edit = false;
                  this.article = {
                      id: '',
                      title: '',
                      body: ''
                  };*/
              }
            },
            editArticle(article){
              this.edit = true;
              this.article.id = article.id;
              this.article.article_id = article.id;
              this.article.title = article.title;
              this.article.body = article.body;

            }
        }
    }
</script>

<style scoped>

</style>