<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>virta-api</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.17.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.17.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-company" class="tocify-header">
                <li class="tocify-item level-1" data-unique="company">
                    <a href="#company">Company</a>
                </li>
                                    <ul id="tocify-subheader-company" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="company-GETapi-v1-company--id-">
                                <a href="#company-GETapi-v1-company--id-">Get company info</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-POSTapi-v1-company">
                                <a href="#company-POSTapi-v1-company">Create a new company</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-PATCHapi-v1-company--id-">
                                <a href="#company-PATCHapi-v1-company--id-">Update an existing company</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-DELETEapi-v1-company--id-">
                                <a href="#company-DELETEapi-v1-company--id-">Delete an existing company</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-GETapi-v1-company--id--stations-count">
                                <a href="#company-GETapi-v1-company--id--stations-count">Get company stations count</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="company-GETapi-v1-company--id--stations-list">
                                <a href="#company-GETapi-v1-company--id--stations-list">Get company stations list</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-station" class="tocify-header">
                <li class="tocify-item level-1" data-unique="station">
                    <a href="#station">Station</a>
                </li>
                                    <ul id="tocify-subheader-station" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="station-GETapi-v1-station--id-">
                                <a href="#station-GETapi-v1-station--id-">Get station info</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="station-POSTapi-v1-station">
                                <a href="#station-POSTapi-v1-station">Create a new station</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="station-PATCHapi-v1-station--id-">
                                <a href="#station-PATCHapi-v1-station--id-">Update existing station</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="station-DELETEapi-v1-station--id-">
                                <a href="#station-DELETEapi-v1-station--id-">Delete an existing station</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="station-GETapi-v1-stations-radius">
                                <a href="#station-GETapi-v1-stations-radius">Get stations within radius</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-status" class="tocify-header">
                <li class="tocify-item level-1" data-unique="status">
                    <a href="#status">Status</a>
                </li>
                                    <ul id="tocify-subheader-status" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="status-GETapi-v1-status">
                                <a href="#status-GETapi-v1-status">GET api/v1/status</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: March 28, 2023</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>An API for EV charging managing</p>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="company">Company</h1>

    <p>Perform CRUD operations for company</p>

                                <h2 id="company-GETapi-v1-company--id-">Get company info</h2>

<p>
</p>

<p>This endpoint lets you get a company info.</p>

<span id="example-requests-GETapi-v1-company--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/company/2" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company/2"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-company--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: null,
    &quot;data&quot;: {
        &quot;id&quot;: 6,
        &quot;parent_company_id&quot;: null,
        &quot;name&quot;: &quot;VirtaLTD&quot;,
        &quot;created_at&quot;: &quot;2023-03-27T12:15:47.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-03-27T12:15:47.000000Z&quot;
    },
    &quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-company--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-company--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-company--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-company--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-company--id-"></code></pre>
</span>
<form id="form-GETapi-v1-company--id-" data-method="GET"
      data-path="api/v1/company/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-company--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-company--id-"
                    onclick="tryItOut('GETapi-v1-company--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-company--id-"
                    onclick="cancelTryOut('GETapi-v1-company--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-company--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/company/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="GETapi-v1-company--id-"
               value="2"
               data-component="url">
    <br>
<p>The ID of the company. Example: <code>2</code></p>
            </div>
                    </form>

                    <h2 id="company-POSTapi-v1-company">Create a new company</h2>

<p>
</p>

<p>This endpoint lets you create a new company.</p>

<span id="example-requests-POSTapi-v1-company">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/company" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"VirtaLTD\",
    \"parent_company_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "VirtaLTD",
    "parent_company_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-company">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 201,
    &quot;message&quot;: &quot;Entity successfully created.&quot;,
    &quot;data&quot;: {
        &quot;name&quot;: &quot;123Test&quot;,
        &quot;parent_company_id&quot;: 22,
        &quot;updated_at&quot;: &quot;2023-03-28T07:50:49.000000Z&quot;,
        &quot;created_at&quot;: &quot;2023-03-28T07:50:49.000000Z&quot;,
        &quot;id&quot;: 27
    },
    &quot;meta&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-company" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-company"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-company" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-company" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-company"></code></pre>
</span>
<form id="form-POSTapi-v1-company" data-method="POST"
      data-path="api/v1/company"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-company', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-company"
                    onclick="tryItOut('POSTapi-v1-company');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-company"
                    onclick="cancelTryOut('POSTapi-v1-company');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-company" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/company</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-company"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-company"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="POSTapi-v1-company"
               value="VirtaLTD"
               data-component="body">
    <br>
<p>The name of the company. Example: <code>VirtaLTD</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_company_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="parent_company_id"                data-endpoint="POSTapi-v1-company"
               value="1"
               data-component="body">
    <br>
<p>The id of the parent company.If not provided, will be set to null. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="company-PATCHapi-v1-company--id-">Update an existing company</h2>

<p>
</p>

<p>This endpoint lets you update a company.</p>

<span id="example-requests-PATCHapi-v1-company--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/company/aut" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"VirtaUpdated\",
    \"parent_company_id\": \"1\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company/aut"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "VirtaUpdated",
    "parent_company_id": "1"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-company--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: &quot;Entity successfully created.&quot;,
    &quot;data&quot;: {
        &quot;name&quot;: &quot;123Test&quot;,
        &quot;parent_company_id&quot;: 22,
        &quot;updated_at&quot;: &quot;2023-03-28T07:50:49.000000Z&quot;,
        &quot;created_at&quot;: &quot;2023-03-28T07:50:49.000000Z&quot;,
        &quot;id&quot;: 1
    },
    &quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (400, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Entity not updated successfully.&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, parent company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Parent company could not be set.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-company--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-company--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-company--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-company--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-company--id-"></code></pre>
</span>
<form id="form-PATCHapi-v1-company--id-" data-method="PATCH"
      data-path="api/v1/company/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-company--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-company--id-"
                    onclick="tryItOut('PATCHapi-v1-company--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-company--id-"
                    onclick="cancelTryOut('PATCHapi-v1-company--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-company--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/company/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="PATCHapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="PATCHapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id"                data-endpoint="PATCHapi-v1-company--id-"
               value="aut"
               data-component="url">
    <br>
<p>The ID of the company. Example: <code>aut</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="PATCHapi-v1-company--id-"
               value="VirtaUpdated"
               data-component="body">
    <br>
<p>The name of the company. Example: <code>VirtaUpdated</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_company_id</code></b>&nbsp;&nbsp;
<small>The</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="parent_company_id"                data-endpoint="PATCHapi-v1-company--id-"
               value="1"
               data-component="body">
    <br>
<p>id of the parent company or &quot;null&quot;. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="company-DELETEapi-v1-company--id-">Delete an existing company</h2>

<p>
</p>

<p>This endpoint lets you delete an existing company.
Deleting a parent company will also delete all it's children and assigned stations.</p>

<span id="example-requests-DELETEapi-v1-company--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/company/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-company--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: &quot;Entity successfully deleted.&quot;,
    &quot;data&quot;: [],
    &quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-company--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-company--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-company--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-company--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-company--id-"></code></pre>
</span>
<form id="form-DELETEapi-v1-company--id-" data-method="DELETE"
      data-path="api/v1/company/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-company--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-company--id-"
                    onclick="tryItOut('DELETEapi-v1-company--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-company--id-"
                    onclick="cancelTryOut('DELETEapi-v1-company--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-company--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/company/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="DELETEapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="DELETEapi-v1-company--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="DELETEapi-v1-company--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the company to be deleted. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="company-GETapi-v1-company--id--stations-count">Get company stations count</h2>

<p>
</p>

<p>This endpoint lets you count the stations of a company.</p>

<span id="example-requests-GETapi-v1-company--id--stations-count">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/company/20/stations/count" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company/20/stations/count"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-company--id--stations-count">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: null,
    &quot;data&quot;: {
        &quot;stations_count&quot;: 2
    },
    &quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-company--id--stations-count" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-company--id--stations-count"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-company--id--stations-count" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-company--id--stations-count" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-company--id--stations-count"></code></pre>
</span>
<form id="form-GETapi-v1-company--id--stations-count" data-method="GET"
      data-path="api/v1/company/{id}/stations/count"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-company--id--stations-count', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-company--id--stations-count"
                    onclick="tryItOut('GETapi-v1-company--id--stations-count');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-company--id--stations-count"
                    onclick="cancelTryOut('GETapi-v1-company--id--stations-count');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-company--id--stations-count" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/company/{id}/stations/count</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-company--id--stations-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-company--id--stations-count"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="GETapi-v1-company--id--stations-count"
               value="20"
               data-component="url">
    <br>
<p>The ID of the company. Example: <code>20</code></p>
            </div>
                    </form>

                    <h2 id="company-GETapi-v1-company--id--stations-list">Get company stations list</h2>

<p>
</p>

<p>This endpoint lets you get a list with stations of the company.</p>

<span id="example-requests-GETapi-v1-company--id--stations-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/company/20/stations/list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/company/20/stations/list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-company--id--stations-list">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
&quot;status&quot;: &quot;success&quot;,
&quot;status_code&quot;: 200,
&quot;message&quot;: null,
&quot;data&quot;: [
{
&quot;id&quot;: 20,
&quot;parent_company_id&quot;: 6,
&quot;name&quot;: &quot;123Test&quot;,
&quot;created_at&quot;: &quot;2023-03-28 06:50:27&quot;,
&quot;updated_at&quot;: &quot;2023-03-28 06:50:27&quot;
},
{
&quot;id&quot;: 23,
&quot;parent_company_id&quot;: 20,
&quot;name&quot;: &quot;123Test&quot;,
&quot;created_at&quot;: &quot;2023-03-28 06:50:36&quot;,
&quot;updated_at&quot;: &quot;2023-03-28 06:50:36&quot;
}
],
&quot;meta&quot;: []</code>
 </pre>
            <blockquote>
            <p>Example response (404, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-company--id--stations-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-company--id--stations-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-company--id--stations-list" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-company--id--stations-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-company--id--stations-list"></code></pre>
</span>
<form id="form-GETapi-v1-company--id--stations-list" data-method="GET"
      data-path="api/v1/company/{id}/stations/list"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-company--id--stations-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-company--id--stations-list"
                    onclick="tryItOut('GETapi-v1-company--id--stations-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-company--id--stations-list"
                    onclick="cancelTryOut('GETapi-v1-company--id--stations-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-company--id--stations-list" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/company/{id}/stations/list</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-company--id--stations-list"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-company--id--stations-list"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="GETapi-v1-company--id--stations-list"
               value="20"
               data-component="url">
    <br>
<p>The ID of the company. Example: <code>20</code></p>
            </div>
                    </form>

                <h1 id="station">Station</h1>

    <p>Perform CRUD operations for station</p>

                                <h2 id="station-GETapi-v1-station--id-">Get station info</h2>

<p>
</p>

<p>This endpoint lets you get a station info.</p>

<span id="example-requests-GETapi-v1-station--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/station/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/station/9"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-station--id-">
            <blockquote>
            <p>Example response (200, success):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: null,
    &quot;data&quot;: {
        &quot;id&quot;: 20,
        &quot;name&quot;: &quot;VirtaLTD&quot;,
        &quot;latitude&quot;: 45.123213,
        &quot;longitude&quot;: 14.12311,
        &quot;company_id&quot;: 20,
        &quot;address&quot;: &quot;TestAddress&quot;,
        &quot;created_at&quot;: &quot;2023-03-28T06:50:59.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2023-03-28T06:50:59.000000Z&quot;
    },
    &quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, station not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Resource not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-station--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-station--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-station--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-station--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-station--id-"></code></pre>
</span>
<form id="form-GETapi-v1-station--id-" data-method="GET"
      data-path="api/v1/station/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-station--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-station--id-"
                    onclick="tryItOut('GETapi-v1-station--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-station--id-"
                    onclick="cancelTryOut('GETapi-v1-station--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-station--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/station/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="GETapi-v1-station--id-"
               value="9"
               data-component="url">
    <br>
<p>The ID of the station. Example: <code>9</code></p>
            </div>
                    </form>

                    <h2 id="station-POSTapi-v1-station">Create a new station</h2>

<p>
</p>

<p>This endpoint lets you create a new station.</p>

<span id="example-requests-POSTapi-v1-station">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/v1/station" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ChargingSpot1\",
    \"latitude\": \"+45.01231\",
    \"longitude\": \"-121.113122\",
    \"company_id\": 1,
    \"address\": \"St.1, Helsinki, Finland\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/station"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ChargingSpot1",
    "latitude": "+45.01231",
    "longitude": "-121.113122",
    "company_id": 1,
    "address": "St.1, Helsinki, Finland"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-station">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">scenario success={
&quot;status&quot;: &quot;success&quot;,
&quot;status_code&quot;: 201,
&quot;message&quot;: &quot;Entity successfully created.&quot;,
&quot;data&quot;: {
&quot;name&quot;: &quot;VirtaLTD&quot;,
&quot;latitude&quot;: &quot;45.123213&quot;,
&quot;longitude&quot;: &quot;14.000&quot;,
&quot;company_id&quot;: 25,
&quot;address&quot;: &quot;Helsinki,Finland&quot;,
&quot;updated_at&quot;: &quot;2023-03-28T09:50:22.000000Z&quot;,
&quot;created_at&quot;: &quot;2023-03-28T09:50:22.000000Z&quot;,
&quot;id&quot;: 29
},
&quot;meta&quot;: []
}</code>
 </pre>
            <blockquote>
            <p>Example response (404, company not found):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Company not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-v1-station" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-station"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-station" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-station" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-station"></code></pre>
</span>
<form id="form-POSTapi-v1-station" data-method="POST"
      data-path="api/v1/station"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-station', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-station"
                    onclick="tryItOut('POSTapi-v1-station');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-station"
                    onclick="cancelTryOut('POSTapi-v1-station');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-station" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/station</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="POSTapi-v1-station"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="POSTapi-v1-station"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="POSTapi-v1-station"
               value="ChargingSpot1"
               data-component="body">
    <br>
<p>The name of the company. Example: <code>ChargingSpot1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="latitude"                data-endpoint="POSTapi-v1-station"
               value="+45.01231"
               data-component="body">
    <br>
<p>The latitude of the location. Example: <code>+45.01231</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="longitude"                data-endpoint="POSTapi-v1-station"
               value="-121.113122"
               data-component="body">
    <br>
<p>The longitude of the location. Example: <code>-121.113122</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>company_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="company_id"                data-endpoint="POSTapi-v1-station"
               value="1"
               data-component="body">
    <br>
<p>The id of the company that owns it. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="address"                data-endpoint="POSTapi-v1-station"
               value="St.1, Helsinki, Finland"
               data-component="body">
    <br>
<p>The address of the charging station. Example: <code>St.1, Helsinki, Finland</code></p>
        </div>
        </form>

                    <h2 id="station-PATCHapi-v1-station--id-">Update existing station</h2>

<p>
</p>

<p>This endpoint lets you update an existing station.</p>

<span id="example-requests-PATCHapi-v1-station--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://localhost/api/v1/station/atque" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"ChargingSpot1\",
    \"latitude\": \"+45.01231\",
    \"longitude\": \"-121.113122\",
    \"company_id\": 1,
    \"address\": \"St.1, Helsinki, Finland\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/station/atque"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "ChargingSpot1",
    "latitude": "+45.01231",
    "longitude": "-121.113122",
    "company_id": 1,
    "address": "St.1, Helsinki, Finland"
};

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-v1-station--id-">
            <blockquote>
            <p>Example response (200, success{):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">&quot;status&quot;: &quot;success&quot;,
&quot;status_code&quot;: 200,
&quot;message&quot;: &quot;Entity successfully updated.&quot;,
&quot;data&quot;: 1,
&quot;meta&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-PATCHapi-v1-station--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-v1-station--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-v1-station--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-v1-station--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-v1-station--id-"></code></pre>
</span>
<form id="form-PATCHapi-v1-station--id-" data-method="PATCH"
      data-path="api/v1/station/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-v1-station--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-v1-station--id-"
                    onclick="tryItOut('PATCHapi-v1-station--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-v1-station--id-"
                    onclick="cancelTryOut('PATCHapi-v1-station--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-v1-station--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/v1/station/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="PATCHapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="PATCHapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="id"                data-endpoint="PATCHapi-v1-station--id-"
               value="atque"
               data-component="url">
    <br>
<p>The ID of the station. Example: <code>atque</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="name"                data-endpoint="PATCHapi-v1-station--id-"
               value="ChargingSpot1"
               data-component="body">
    <br>
<p>The name of the company. Example: <code>ChargingSpot1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="latitude"                data-endpoint="PATCHapi-v1-station--id-"
               value="+45.01231"
               data-component="body">
    <br>
<p>The latitude of the location. Example: <code>+45.01231</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="longitude"                data-endpoint="PATCHapi-v1-station--id-"
               value="-121.113122"
               data-component="body">
    <br>
<p>The longitude of the location. Example: <code>-121.113122</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>company_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               name="company_id"                data-endpoint="PATCHapi-v1-station--id-"
               value="1"
               data-component="body">
    <br>
<p>The id of the company that owns it. Example: <code>1</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
               name="address"                data-endpoint="PATCHapi-v1-station--id-"
               value="St.1, Helsinki, Finland"
               data-component="body">
    <br>
<p>The address of the charging station. Example: <code>St.1, Helsinki, Finland</code></p>
        </div>
        </form>

                    <h2 id="station-DELETEapi-v1-station--id-">Delete an existing station</h2>

<p>
</p>

<p>This endpoint lets you delete an existing station.</p>

<span id="example-requests-DELETEapi-v1-station--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/api/v1/station/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/station/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-station--id-">
            <blockquote>
            <p>Example response (200, success{):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">&quot;status&quot;: &quot;success&quot;,
&quot;status_code&quot;: 200,
&quot;message&quot;: &quot;Entity successfully deleted.&quot;,
&quot;data&quot;: 1,
&quot;meta&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-v1-station--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-station--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-station--id-" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-station--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-station--id-"></code></pre>
</span>
<form id="form-DELETEapi-v1-station--id-" data-method="DELETE"
      data-path="api/v1/station/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-station--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-station--id-"
                    onclick="tryItOut('DELETEapi-v1-station--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-station--id-"
                    onclick="cancelTryOut('DELETEapi-v1-station--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-station--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/station/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="DELETEapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="DELETEapi-v1-station--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="id"                data-endpoint="DELETEapi-v1-station--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the station to be deleted. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="station-GETapi-v1-stations-radius">Get stations within radius</h2>

<p>
</p>

<p>This endpoint lets you get stations within a radius.</p>

<span id="example-requests-GETapi-v1-stations-radius">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/stations/radius" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"radius_km\": 50,
    \"latitude\": \"+45.01231\",
    \"longitude\": \"-121.113122\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/stations/radius"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "radius_km": 50,
    "latitude": "+45.01231",
    "longitude": "-121.113122"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-stations-radius">
            <blockquote>
            <p>Example response (200, success{):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">&quot;status&quot;: &quot;success&quot;,
&quot;status_code&quot;: 200,
&quot;message&quot;: null,
&quot;data&quot;: {
&quot;45.123213,14&quot;: [
{
&quot;id&quot;: 28,
&quot;name&quot;: &quot;123Test&quot;,
&quot;latitude&quot;: 45.123213,
&quot;longitude&quot;: 14,
&quot;company_id&quot;: 25,
&quot;address&quot;: &quot;TestAddress&quot;,
&quot;created_at&quot;: &quot;2023-03-28 09:09:13&quot;,
&quot;updated_at&quot;: &quot;2023-03-28 09:09:13&quot;,
&quot;distance&quot;: 13.700001346387596
}
],
&quot;45.123213,14.12311&quot;: [
{
&quot;id&quot;: 7,
&quot;name&quot;: &quot;123Test&quot;,
&quot;latitude&quot;: 45.123213,
&quot;longitude&quot;: 14.12311,
&quot;company_id&quot;: 6,
&quot;address&quot;: &quot;TestAddress&quot;,
&quot;created_at&quot;: &quot;2023-03-27 12:25:12&quot;,
&quot;updated_at&quot;: &quot;2023-03-27 12:25:12&quot;,
&quot;distance&quot;: 16.76832087503264
},
{
&quot;id&quot;: 15,
&quot;name&quot;: &quot;123Test&quot;,
&quot;latitude&quot;: 45.123213,
&quot;longitude&quot;: 14.12311,
&quot;company_id&quot;: 6,
&quot;address&quot;: &quot;TestAddress&quot;,
&quot;created_at&quot;: &quot;2023-03-27 12:27:54&quot;,
&quot;updated_at&quot;: &quot;2023-03-27 12:27:54&quot;,
&quot;distance&quot;: 16.76832087503264
}
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-stations-radius" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-stations-radius"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-stations-radius" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-stations-radius" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-stations-radius"></code></pre>
</span>
<form id="form-GETapi-v1-stations-radius" data-method="GET"
      data-path="api/v1/stations/radius"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-stations-radius', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-stations-radius"
                    onclick="tryItOut('GETapi-v1-stations-radius');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-stations-radius"
                    onclick="cancelTryOut('GETapi-v1-stations-radius');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-stations-radius" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/stations/radius</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-stations-radius"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-stations-radius"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>radius_km</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               name="radius_km"                data-endpoint="GETapi-v1-stations-radius"
               value="50"
               data-component="body">
    <br>
<p>The km radius to look in. Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>latitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="latitude"                data-endpoint="GETapi-v1-stations-radius"
               value="+45.01231"
               data-component="body">
    <br>
<p>The latitude of the location. Example: <code>+45.01231</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>longitude</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="longitude"                data-endpoint="GETapi-v1-stations-radius"
               value="-121.113122"
               data-component="body">
    <br>
<p>The longitude of the location. Example: <code>-121.113122</code></p>
        </div>
        </form>

                <h1 id="status">Status</h1>

    <p>See the status of the API</p>

                                <h2 id="status-GETapi-v1-status">GET api/v1/status</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-status">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/v1/status" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/v1/status"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-status">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: &quot;success&quot;,
    &quot;status_code&quot;: 200,
    &quot;message&quot;: null,
    &quot;data&quot;: {
        &quot;status&quot;: &quot;up&quot;,
        &quot;time&quot;: &quot;2023-03-28T09:59:22.788349Z&quot;,
        &quot;services&quot;: {
            &quot;database&quot;: &quot;up&quot;
        }
    },
    &quot;meta&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-status" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-status"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-status" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-status"></code></pre>
</span>
<form id="form-GETapi-v1-status" data-method="GET"
      data-path="api/v1/status"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-status', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-status"
                    onclick="tryItOut('GETapi-v1-status');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-status"
                    onclick="cancelTryOut('GETapi-v1-status');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-status" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/status</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Content-Type"                data-endpoint="GETapi-v1-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
               name="Accept"                data-endpoint="GETapi-v1-status"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
