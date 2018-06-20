        </main>
        <footer>
            tous droits réservés -&copy;2018
        </footer>
    </div><!--/.page-->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
var app = {};

// symfony route ajax
app.urlAjax = 'ajax';   // FIXME
app.ajax = function (inForm, myCallback)
{
    formData = new FormData;
    
    for(key in inForm)
    {
        formData.append(key, inForm[key]);
    }

    fetch(app.urlAjax, {
        method:          'POST',
        credentials:     'include',
        body:            formData
    })
    .then(function (reponse) {
        console.log(reponse);
        return reponse.json();
    })
    .then(function (json) {
        myCallback(json);
    });
    
}

app.vue = new Vue({
  el: '.page',
  data: {
    message: 'Hello Vue !'
  },
  created () {
      app.ajax({ classForm: "Ajax", methodForm: "message" }, function(json){
        if (json['Ajax@message'])
            app.vue.message = json['Ajax@message'];
      });
  }
})    
    </script>
</body>
</html>
