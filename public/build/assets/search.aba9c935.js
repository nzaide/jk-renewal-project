new Vue({el:"#app",data(){return{language:null,job_posts:{data:[],currentPage:1,lastPage:null,defaultUrl:"/admin/job-posts/search",total:0,search:""}}},methods:{setLanguage(a){this.language=a},async fetchData(a,s=null,o=""){s||(s=this[a].defaultUrl+"?language="+this.language+"&search="+o),this[a].data=[],this[a].search=o;const t=await(await fetch(s)).json();t.data.forEach(e=>{this[a].data.push(e)}),this[a].currentPage=t.current_page,this[a].startPage=t.from,this[a].lastPage=t.last_page,this[a].prevPageUrl=t.prev_page_url,this[a].nextPageUrl=t.next_page_url,this[a].links=t.links,this[a].total=t.total,Vue.nextTick(function(){$(".tooltip-selector").popover({animate:!0}).on("mouseenter",function(){var e=this;$(this).popover("show"),$(".popover").on("mouseleave",function(){$(e).popover("hide")})}).on("mouseleave",function(){var e=this;$(".popover:hover").length||$(e).popover("hide")})})}}});
