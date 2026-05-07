const html = `<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BS Army</title>
  <style>
    :root {
      --dark-green: #20493c;
      --dark-green-deep: #1a3d31;
      --light-tan: #f9d3c1;
      --muted: #797070;
      --surface: rgba(255, 255, 255, 0.06);
      --surface-strong: rgba(255, 255, 255, 0.1);
      --text: #f6f2ed;
      --text-muted: #d7c9ba;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      min-height: 100vh;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      color: var(--text);
      background: radial-gradient(circle at top, rgba(255, 255, 255, 0.06), transparent 32%),
        linear-gradient(180deg, #092117 0%, #153628 35%, #10261f 100%);
    }

    a {
      color: inherit;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
      text-decoration-style: dashed;
    }

    main {
      width: min(1120px, calc(100% - 2rem));
      margin: 0 auto;
      padding: 3.5rem 0 2rem;
    }

    .brand {
      margin: 0;
      font-size: clamp(2.2rem, 5vw, 3.5rem);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      font-weight: 900;
      color: var(--light-tan);
      font-family: "Courier New", Courier, monospace;
    }

    .tagline,
    .section-description {
      color: var(--text-muted);
      line-height: 1.75;
    }

    .tagline {
      margin: 0.75rem 0 0;
      font-size: 1rem;
      max-width: 38rem;
    }

    .hero {
      display: grid;
      gap: 2rem;
      padding: 2rem 0 1rem;
    }

    .hero h1 {
      margin: 0;
      font-size: clamp(3rem, 6vw, 5rem);
      line-height: 0.98;
      max-width: 12ch;
    }

    .hero p {
      margin: 0;
      max-width: 48rem;
      font-size: 1.05rem;
    }

    .cta-row {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 1.75rem;
    }

    .button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 1rem 1.5rem;
      border-radius: 0.75rem;
      font-weight: 700;
      transition: transform 0.18s ease, background-color 0.18s ease, color 0.18s ease;
      border: 1px solid transparent;
    }

    .button:hover {
      transform: translateY(-1px);
    }

    .button-primary {
      background: var(--light-tan);
      color: var(--dark-green);
      border-color: var(--light-tan);
    }

    .button-primary:hover {
      background: var(--dark-green);
      color: #fff;
    }

    .button-secondary {
      background: rgba(255, 255, 255, 0.08);
      color: var(--text);
      border-color: rgba(255, 255, 255, 0.18);
    }

    .button-secondary:hover {
      background: rgba(255, 255, 255, 0.14);
    }

    .section-block {
      margin-top: 3rem;
      padding: 2rem;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.07);
      border-radius: 1.25rem;
    }

    .section-block h2 {
      margin-top: 0;
      margin-bottom: 0.75rem;
      font-size: clamp(1.6rem, 2.2vw, 2.2rem);
      color: #fff;
    }

    .section-block p {
      margin: 0;
      max-width: 54rem;
    }

    .feature-grid {
      display: grid;
      gap: 1.25rem;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      margin-top: 3rem;
    }

    .feature-card {
      background: var(--surface);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 1.25rem;
      padding: 1.5rem;
      min-height: 180px;
    }

    .feature-card h3 {
      margin: 0 0 0.85rem;
      font-size: 1.05rem;
      color: #fff;
    }

    .feature-card p {
      margin: 0;
      color: var(--text-muted);
      line-height: 1.8;
    }

    .site-footer {
      margin-top: 3rem;
      padding: 3rem 0 2rem;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
    }

    .footer-inner {
      display: grid;
      gap: 2rem;
      grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
      width: min(1120px, calc(100% - 2rem));
      margin: 0 auto;
    }

    .footer-column h3 {
      margin: 0 0 0.9rem;
      font-size: 0.95rem;
      color: #fff;
    }

    .footer-column ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 0.55rem;
    }

    .footer-column a {
      color: var(--text-muted);
      font-size: 0.98rem;
    }

    .footer-column a:hover {
      color: var(--light-tan);
    }

    .footer-brand {
      margin: 0 0 1rem;
      font-family: "Courier New", Courier, monospace;
      font-size: 1rem;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: #fff;
    }

    .footer-copy {
      margin: 0;
      color: var(--text-muted);
      line-height: 1.8;
      font-size: 0.95rem;
    }

    .footer-copy small {
      display: block;
      margin-top: 1rem;
      color: var(--muted);
    }

    @media (max-width: 720px) {
      .hero h1 {
        font-size: 2.6rem;
      }

      .cta-row {
        flex-direction: column;
        align-items: stretch;
      }
    }
  </style>
</head>
<body>
  <main>
    <div>
      <p class="brand">bsarmy</p>
      <p class="tagline">Removing the <i>BS</i> since 2023.</p>
    </div>

    <section class="hero">
      <h1>Unit-Level Anonymous Feedback</h1>
      <p>Privacy-focused, anonymous-by-design feedback. Allows for candid and honest communication within units.</p>
      <div class="cta-row">
        <a class="button button-primary" href="https://github.com/thebarracksarmy" target="_blank" rel="noopener noreferrer">GitHub account</a>
        <a class="button button-secondary" href="https://beta.feedback.bsarmy.com" target="_blank" rel="noopener noreferrer">See beta feedback site</a>
      </div>
    </section>

    <section class="section-block">
      <h2>Anonymous feedback to compliment Command Climate surveys.</h2>
      <p class="section-description">Offers an anonymous feedback form for leadership. Please have your tops request, no PFC's please. <br>Built to make it easy for senior enlisted and officers to learn what matters to troops without unnecessary bureaucracy.</p>
    </section>

  <footer class="site-footer">
    <div class="footer-inner">
      <div>
        <p class="footer-copy">This website is not endorsed by the Department of War, the US Army, or any government agency.</p>
        <small>© thebarracksarmy 2026</small>
      </div>

      <div class="footer-column">
        <h3>Help</h3>
        <ul>
          <li><a href="https://github.com/thebarracksarmy">GitHub</a></li>
          <li><a href="https://beta.feedback.bsarmy.com">Feedback beta</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>`;

const allowedHosts = new Set(['bsarmy.com', 'www.bsarmy.com']);

export default {
	async fetch(request) {
		const url = new URL(request.url);
		if (!allowedHosts.has(url.hostname)) {
			return new Response('Not found', { status: 404 });
		}

		return new Response(html, {
			headers: {
				'Content-Type': 'text/html; charset=utf-8',
			},
		});
	},
};
