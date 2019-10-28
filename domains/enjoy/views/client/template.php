<script id="error-template" type="text/x-handlebars-template">
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span class="messages">{{responseText}}</span></p>
    </div>
</script>

<script id="success-template" type="text/x-handlebars-template">
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span class="status">{{status}}:       </span>
        <ul class="uk-margin-remove">
            {{#each data}}
            <li> {{this}}</li>
            {{else}}
            <li>Список пуст</li>
            {{/each}}
         </ul>

    </div>
</script>

<script id="render-twits-template" type="text/x-handlebars-template">
    <div class="uk-alert-success" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <span class="status">{{user}}:       </span>
        <ul class="uk-margin-remove">
            {{#each feed}}
            <li> <b>{{this.user}}</b><br> {{this.tweet}}</li>
            {{#each hashtag}}<a href="https://twitter.com/hashtag/{{this}}?src=hashtag_click"  class="uk-button-danger">{{this}}</a><br>{{/each}}

            {{else}}
            <li>Список пуст</li>
            {{/each}}
        </ul>
    </div>
</script>