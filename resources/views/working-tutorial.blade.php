@extends('layouts.app')
@section('content')
    <div class="container mt-5 p-5">
        <center><h2>How It Works Altogether</h2></center><br>
        <div class="row">
            <h3 style="text-transform: capitalize;text-decoration: underline">Now, we're ready to test Your Website.</h3><br><br><br>

        </div>
        <div class="row">
            <h3>Let's create the <code class="inline">auth_redirection.php</code> file with the following
                contents.</h3>
        </div>
        <div class="container">
            <div class="line number1 index0 alt2"><code class="php plain">&lt;?php</code></div>
            <div class="line number2 index1 alt1"><code class="php variable">$query</code> <code class="php plain">=
                    http_build_query(</code><code class="php keyword">array</code><code class="php plain">(</code></div>
            <div class="line number3 index2 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'client_id'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'1'</code><code class="php plain">,</code></div>
            <div class="line number4 index3 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'redirect_uri'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'<a href="http://localhost/oauth2_client/callback.php">http://your-website.com/callback.php</a>'</code><code
                        class="php plain">,</code></div>
            <div class="line number5 index4 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'response_type'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'code'</code><code class="php plain">,</code></div>
            <div class="line number6 index5 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'scope'</code> <code class="php plain">=&gt; </code><code class="php string">''</code><code
                        class="php plain">,</code></div>
            <div class="line number7 index6 alt2"><code class="php plain">));</code></div>
            <div class="line number8 index7 alt1">&nbsp;</div>
            <div class="line number9 index8 alt2"><code class="php plain">header(</code><code class="php string">'Location:
                    <a href="http://your-laravel-site-url/oauth/authorize?">http://threeoption.com/oauth/authorize?</a>'</code><code
                        class="php plain">.</code><code class="php variable">$query</code><code
                        class="php plain">);</code></div>
        </div>
        <br>
        <div class="row">
            <h3>Make sure to change the <code>client_id</code> and <code>redirect_uri</code> parameters to reflect your
                own settings—the ones that
                you used while creating the client account.</h3>
        </div>
        <br><br>
        <h3>Next, let's create the <code>callback.php</code> file with the following contents.
        </h3>
        <div class="container">
            <div class="line number1 index0 alt2"><code class="php plain">&lt;?php</code></div>
            <div class="line number2 index1 alt1"><code class="php comments">// check if the response includes
                    authorization_code</code></div>
            <div class="line number3 index2 alt2"><code class="php keyword">if</code> <code
                        class="php plain">(isset(</code><code class="php variable">$_REQUEST</code><code
                        class="php plain">[</code><code class="php string">'code'</code><code class="php plain">]) &amp;&amp; </code><code
                        class="php variable">$_REQUEST</code><code class="php plain">[</code><code class="php string">'code'</code><code
                        class="php plain">])</code></div>
            <div class="line number4 index3 alt1"><code class="php plain">{</code></div>
            <div class="line number5 index4 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$ch</code> <code class="php plain">= curl_init();</code></div>
            <div class="line number6 index5 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$url</code> <code class="php plain">= </code><code class="php string">'<a
                            href="http://your-laravel-site-url/oauth/token">http://threeoption.com/oauth/token</a>'</code><code
                        class="php plain">;</code></div>
            <div class="line number7 index6 alt2">&nbsp;</div>
            <div class="line number8 index7 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$params</code> <code class="php plain">= </code><code class="php keyword">array</code><code
                        class="php plain">(</code></div>
            <div class="line number9 index8 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'grant_type'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'authorization_code'</code><code class="php plain">,</code></div>
            <div class="line number10 index9 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'client_id'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'1'</code><code class="php plain">,</code></div>
            <div class="line number11 index10 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'client_secret'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'zMm0tQ9Cp7LbjK3QTgPy1pssoT1X0u7sg0YWUW01'</code><code
                        class="php plain">,</code></div>
            <div class="line number12 index11 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'redirect_uri'</code> <code class="php plain">=&gt; </code><code
                        class="php string">'<a href="http://localhost/oauth2_client/callback.php">http://your-website.com/callback.php</a>'</code><code
                        class="php plain">,</code></div>
            <div class="line number13 index12 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'code'</code> <code class="php plain">=&gt; </code><code
                        class="php variable">$_REQUEST</code><code class="php plain">[</code><code class="php string">'code'</code><code
                        class="php plain">]</code></div>
            <div class="line number14 index13 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">);</code></div>
            <div class="line number15 index14 alt2">&nbsp;</div>
            <div class="line number16 index15 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">,CURLOPT_URL, </code><code class="php variable">$url</code><code
                        class="php plain">);</code></div>
            <div class="line number17 index16 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">, CURLOPT_RETURNTRANSFER, 1);</code></div>
            <div class="line number18 index17 alt1">&nbsp;</div>
            <div class="line number19 index18 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$params_string</code> <code class="php plain">= </code><code
                        class="php string">''</code><code class="php plain">;</code></div>
            <div class="line number20 index19 alt1">&nbsp;</div>
            <div class="line number21 index20 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php keyword">if</code> <code class="php plain">(</code><code class="php functions">is_array</code><code
                        class="php plain">(</code><code class="php variable">$params</code><code class="php plain">)
                    &amp;&amp; </code><code class="php functions">count</code><code class="php plain">(</code><code
                        class="php variable">$params</code><code class="php plain">))</code></div>
            <div class="line number22 index21 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">{</code></div>
            <div class="line number23 index22 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php keyword">foreach</code><code class="php plain">(</code><code class="php variable">$params</code>
                <code class="php keyword">as</code> <code class="php variable">$key</code><code
                        class="php plain">=&gt;</code><code class="php variable">$value</code><code class="php plain">)
                    {</code></div>
            <div class="line number24 index23 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$params_string</code> <code class="php plain">.= </code><code
                        class="php variable">$key</code><code class="php plain">.</code><code
                        class="php string">'='</code><code class="php plain">.</code><code
                        class="php variable">$value</code><code class="php plain">.</code><code class="php string">'&amp;'</code><code
                        class="php plain">;</code></div>
            <div class="line number25 index24 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">}</code></div>
            <div class="line number26 index25 alt1">&nbsp;</div>
            <div class="line number27 index26 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">rtrim(</code><code class="php variable">$params_string</code><code
                        class="php plain">, </code><code class="php string">'&amp;'</code><code
                        class="php plain">);</code></div>
            <div class="line number28 index27 alt1">&nbsp;</div>
            <div class="line number29 index28 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">,CURLOPT_POST, </code><code class="php functions">count</code><code
                        class="php plain">(</code><code class="php variable">$params</code><code
                        class="php plain">));</code></div>
            <div class="line number30 index29 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">,CURLOPT_POSTFIELDS, </code><code
                        class="php variable">$params_string</code><code class="php plain">);</code></div>
            <div class="line number31 index30 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">}</code></div>
            <div class="line number32 index31 alt1">&nbsp;</div>
            <div class="line number33 index32 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$result</code> <code class="php plain">= curl_exec(</code><code
                        class="php variable">$ch</code><code class="php plain">);</code></div>
            <div class="line number34 index33 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_close(</code><code class="php variable">$ch</code><code
                        class="php plain">);</code></div>
            <div class="line number35 index34 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$response</code> <code class="php plain">= json_decode(</code><code
                        class="php variable">$result</code><code class="php plain">);</code></div>
            <div class="line number36 index35 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code>&nbsp;</div>
            <div class="line number37 index36 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php comments">// check if the response includes access_token</code></div>
            <div class="line number38 index37 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php keyword">if</code> <code class="php plain">(isset(</code><code class="php variable">$response</code><code
                        class="php plain">-&gt;access_token) &amp;&amp; </code><code
                        class="php variable">$response</code><code class="php plain">-&gt;access_token)</code></div>
            <div class="line number39 index38 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">{</code></div>
            <div class="line number40 index39 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php comments">// you would like to store the access_token in the session though...</code>
            </div>
            <div class="line number41 index40 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$access_token</code> <code class="php plain">= </code><code
                        class="php variable">$response</code><code class="php plain">-&gt;access_token;</code></div>
            <div class="line number42 index41 alt1">&nbsp;</div>
            <div class="line number43 index42 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php comments">// use above token to make further api calls in this session or until the
                    access token expires</code></div>
            <div class="line number44 index43 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$ch</code> <code class="php plain">= curl_init();</code></div>
            <div class="line number45 index44 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$url</code> <code class="php plain">= </code><code class="php string">'<a
                            href="http://your-laravel-site-url/api/user/get">http://threeoption.com/api/user/get</a>'</code><code
                        class="php plain">;</code></div>
            <div class="line number46 index45 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$header</code> <code class="php plain">= </code><code class="php keyword">array</code><code
                        class="php plain">(</code></div>
            <div class="line number47 index46 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php string">'Authorization: Bearer '</code><code class="php plain">. </code><code
                        class="php variable">$access_token</code></div>
            <div class="line number48 index47 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">);</code></div>
            <div class="line number49 index48 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$query</code> <code class="php plain">= http_build_query(</code><code
                        class="php keyword">array</code><code class="php plain">(</code><code
                        class="php string">'uid'</code> <code class="php plain">=&gt; </code><code class="php string">'1'</code><code
                        class="php plain">));</code></div>
            <div class="line number50 index49 alt1">&nbsp;</div>
            <div class="line number51 index50 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">,CURLOPT_URL, </code><code class="php variable">$url</code> <code
                        class="php plain">. </code><code class="php string">'?'</code> <code class="php plain">. </code><code
                        class="php variable">$query</code><code class="php plain">);</code></div>
            <div class="line number52 index51 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">, CURLOPT_RETURNTRANSFER, 1);</code></div>
            <div class="line number53 index52 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_setopt(</code><code class="php variable">$ch</code><code
                        class="php plain">, CURLOPT_HTTPHEADER, </code><code class="php variable">$header</code><code
                        class="php plain">);</code></div>
            <div class="line number54 index53 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$result</code> <code class="php plain">= curl_exec(</code><code
                        class="php variable">$ch</code><code class="php plain">);</code></div>
            <div class="line number55 index54 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">curl_close(</code><code class="php variable">$ch</code><code
                        class="php plain">);</code></div>
            <div class="line number56 index55 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php variable">$response</code> <code class="php plain">= json_decode(</code><code
                        class="php variable">$result</code><code class="php plain">);</code></div>
            <div class="line number57 index56 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">var_dump(</code><code class="php variable">$result</code><code
                        class="php plain">);</code></div>
            <div class="line number58 index57 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">}</code></div>
            <div class="line number59 index58 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php keyword">else</code></div>
            <div class="line number60 index59 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">{</code></div>
            <div class="line number61 index60 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php comments">// for some reason, the access_token was not available</code></div>
            <div class="line number62 index61 alt1"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php comments">// debugging goes here</code></div>
            <div class="line number63 index62 alt2"><code class="php spaces">&nbsp;&nbsp;&nbsp;&nbsp;</code><code
                        class="php plain">}</code></div>
            <div class="line number64 index63 alt1"><code class="php plain">}</code></div>
        </div>
        <br>
        <p>Again, make sure to adjust the URLs and client credentials according to your setup in the above file.
        </p><br>
    </div>
@endsection
