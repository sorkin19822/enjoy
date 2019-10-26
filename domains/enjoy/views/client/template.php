<script id="error-template" type="text/x-handlebars-template">
    <div class="uk-alert-danger" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p><span class="status">{{status}}:       </span><span class="messages">{{messages}}</span></p>
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