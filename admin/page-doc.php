<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/blog.css" />
    <link rel="stylesheet" href="css/prism.css" />
  </head>
  <body>
    <div class="content">
      <h1 id="head-title">Blog Post Guidelines</h1>

      <p>
        Thank you for your interest in contributing to our blog! We appreciate
        your desire to share your thoughts and expertise with our audience.
      </p>

      <h2>Article Guidelines:</h2>
      <div class="navigation">
        <ol>
            <h3><li><a href="#headline">Headline</a></h3>
                <ul>
                    <h4><li><a href="#main-head">Main Headline</a></li></h4>
                    <h4><li><a href="#sub-head">Sub Headline</a></li></h4>
                    <h4><li><a href="#key-point">Key Point</a></li></h4>
                </ul>
            </li>
            <h3><li><a href="#tx-style">Text Style</a></li>
                <ul>
                    <h4><li><a href="#highlight">Highlight</a></li></h4>
                    <h4><li><a href="#underline">underline</a></li></h4>
                </ul>
            </li>
            <h3><li><a href="#list">List</a></li>
                <ul>
                    <h4><li><a href="#unlist">Unordered List</a></li></h4>
                    <h4><li><a href="#olist">Ordered List</a></li></h4>
                </ul>
            </li>
            <h3><li><a href="#media">Media</a></li>
                <ul>
                    <h4><li><a href="#code">Code Snippet</a></li></h4>
                    <h4><li><a href="#img">Image Snippet</a></li></h4>
                </ul>
            </li>
        </ol>
      </div>
      <div class="description">
        <h3 id="headline">Headline</h3>
        <!-- headline -->
        <div class="head" >
          <h4 id="main-head">Add Headline</h4>
          <pre>
                    <code class="language-html">
                        &lt;h2&gt;Headline&lt;/h2&gt;
                    </code>
                </pre>
          <div class="preview">
            <i>preview</i>
            <h2>Headline</h2>
          </div>

          <h4 id="sub-head">Add Sub Headline</h4>
          <pre>
                    <code class="language-html">
                        &lt;h3&gt;Headline&lt;/h3&gt;
                    </code>
                </pre>
          <div class="preview">
            <i>preview</i>
            <h3>Headline</h3>
          </div>

          <h4 id="key-point">Add Key Point</h4>
          <pre>
                    <code class="language-html">
                        &lt;h4&gt;Headline&lt;/h4&gt;
                    </code>
                </pre>
          <div class="preview">
            <i>preview</i>
            <h4>Headline</h4>
          </div>
        </div>
        <div id="tx-style">
            <h3>Text Style</h3>
            <h4 id="highlight">Highlight</h4>
            <pre>
                <code class="language-html">
                    This is &lt;mark&gt;sample&lt;/mark&gt; text.
                </code>
            </pre>
            <div class="preview">
                <i>preview</i>
                <p>This is <mark>sample</mark> text.</p>
            </div>
            <h4 id="underline">underline</h4>
            <p>Add <mark><code>underline</code></mark> class name to any element.</p>
            <pre>
                <code class="language-html">
                    This is &lt;span class="underline"&gt;sample&lt;/span&gt; text.
                </code>
            </pre>
            <div class="preview">
                <i>preview</i>
                <p>This is <span class="underline">sample</span> text.</p>
            </div>
        </div>
        <!-- list -->
        <div class="list" id="list">
            <h3>List</h3>
          <h4 id="unlist">Add Unordered list</h4>
          <pre>
                    <code class="language-html">
                        &lt;ul&gt;
                            &lt;li&gt;item-1&lt;/li&gt;
                            &lt;li&gt;item-2&lt;/li&gt;
                        &lt;/ul&gt;
                    </code>
                </pre>
          <div class="preview">
            <i>preview</i>
            <ul>
              <li>item-1</li>
              <li>item-2</li>
            </ul>
          </div>
          <h4 id="olist">Add Ordered list</h4>
          <pre>
                    <code class="language-html">
                        &lt;ol&gt;
                            &lt;li&gt;item-1&lt;/li&gt;
                            &lt;li&gt;item-2&lt;/li&gt;
                        &lt;/ol&gt;
                    </code>
                </pre>
          <div class="preview">
            <i>preview</i>
            <ol>
              <li>item-1</li>
              <li>item-2</li>
            </ol>
          </div>
        </div>
        <!-- code -->
        <h3 id="media">Media</h3>
        <div class="code" id="code">
            <h4>Add code snippet</h4>
            <p>Replaces the <code>language-<mark>xxx</mark></code> with your language <span class="underline">(Ex: language-html)</span></p>
            <pre>
                <code class="language-html">
                    <span>&</span><span>lt;</span>pre<span>&</span>gt;
                        <span>&</span><span>lt;</span>code class="language-xxx"<span>&</span>gt;
                            <span>&</span><span>lt;</span>div class="box"<span>&</span>gt;
                            <span>&</span><span>lt;</span>/div<span>&</span>gt;
                        <span>&</span><span>lt;</span>/code<span>&</span>gt;
                    <span>&</span><span>lt;</span>/pre<span>&</span>gt;
                </code>
            </pre>
            <div class="preview">
                <i>preview</i>
                <pre>
                    <code class="language-html">
                            &lt;div class="box"&gt;&lt;/div&gt;
                    </code>
                </pre>
            </div>
        </div>
        <div class="image" id="img">
            <h4>Image snippet</h4>
            <p>You must inclued the <span class="underline">class name</span> <code>
                <mark>img-snip</mark>
            </code> for the image.</p>
            <pre>
                <code class="language-html">
                    &lt;img src="image.png" class="img-snip" /&gt;
                </code>
            </pre>
            <div><img src="img/image.png" alt="" class="img-snip" ></div>
        </div>
        <div class="embed">
            <h4>Embed</h4>
            <p>Replace you link in <code>
                <mark>src</mark>
            </code></p>
            <pre>
                <code class="language-html">
                    &lt;iframe src="embed.html" frameborder="0"&gt;&lt;/iframe&gt;
                </code>
            </pre>
            <div class="preview">
                <i>preview</i>
                <iframe src="embed.html" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    <script src="css/prism.js"></script>
  </body>
</html>
