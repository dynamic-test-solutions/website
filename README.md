# Dynamic Test Solutions — Website

Source for the company website at **https://dynamic-test.com**.

This is a **static HTML site** hosted on **GitHub Pages**. It deploys automatically from the `main` branch — commit a change to `main` and the live site rebuilds within a minute or two. There's no build step, no database, and no manual upload.

## Editing in short

1. Edit the relevant `.html` file. The file path matches the page's URL — e.g. `lang/en/aboutus/history.html` is the "Our History" page.
2. Commit to `main` (edit in the browser, or clone locally and push).
3. The site redeploys automatically. Check the **Actions** tab for deploy status, then hard-refresh the live page.

**Full instructions, file map, and caveats: see [EDITING.md](./EDITING.md).**

## Important caveats

- **PHP and `cgi-bin/` do not run.** GitHub Pages serves static files only, so the legacy `.php` form pages (careers, inquiry) are inert — submissions go nowhere. A working form needs a third-party form service or a serverless function.
- **Do not delete the `CNAME` file** in the repo root — it binds the `dynamic-test.com` domain. Removing it breaks the custom domain and HTTPS.
- **No staging.** Edits to `main` go live fast; preview locally before committing anything non-trivial.

## Hosting reference

- **Host:** GitHub Pages (`main` branch, root folder)
- **DNS:** Cloudflare (DNS-only, not proxied)
- **HTTPS:** handled by GitHub Pages
