# DTS Website — Editing & Update Guide

A practical guide for anyone with repository access to update or modify the Dynamic Test Solutions website (**dynamic-test.com**). Read the "How it works" section once, then use the rest as reference.

---

## How the site works (the 30-second mental model)

- The site is a **static HTML site** — plain `.html` files, plus images, CSS, JS, and PDFs. There is no database, no CMS, and no build step.
- It is hosted on **GitHub Pages**, served from the **`main`** branch of the repo at **https://github.com/dynamic-test-solutions/website**.
- **Editing = editing a file and committing it.** When a change lands on `main`, GitHub automatically rebuilds and redeploys the live site — usually within a minute or two. There is nothing to upload and no separate "publish" button.
- DNS and HTTPS are already configured (Cloudflare handles DNS; GitHub Pages provides the HTTPS certificate). **You don't need to touch either** to edit content.

---

## What you need

- **Write access** to the `dynamic-test-solutions/website` repository. (Read-only access lets you view but not save changes.)
- A GitHub account that's signed in. That's it for quick edits. For bigger changes, see the "local copy" workflow below.

---

## Where each page lives

Files map **1:1 to URLs**. The path after `dynamic-test.com/` is the path of the file in the repo. So to find the file behind any page, just look at its URL.

| Page | Live URL | File in repo |
| --- | --- | --- |
| Home | `/` | `index.html` |
| Our Business | `/lang/en/aboutus/business.html` | `lang/en/aboutus/business.html` |
| Our Value Add | `/lang/en/aboutus/our-value-add.html` | `lang/en/aboutus/our-value-add.html` |
| Our Quality | `/lang/en/aboutus/quality.html` | `lang/en/aboutus/quality.html` |
| Our History | `/lang/en/aboutus/history.html` | `lang/en/aboutus/history.html` |
| Our Locations | `/lang/en/aboutus/our-locations.html` | `lang/en/aboutus/our-locations.html` |
| Products (Package) | `/lang/en/products/package.html` | `lang/en/products/package.html` |
| Products (Wafer) | `/lang/en/products/wafer.html` | `lang/en/products/wafer.html` |
| Products (Probe Card) | `/lang/en/products/probe.html` | `lang/en/products/probe.html` |
| Bench & Characterization | `/lang/en/products/bench.html` | `lang/en/products/bench.html` |
| Services (Design/Fab/Assembly/Turn Key) | `/lang/en/design/*.html` | `lang/en/design/*.html` |
| Tester Platforms | `/lang/en/testerplatforms/index.html` | `lang/en/testerplatforms/index.html` |
| News | `/lang/en/news/index.html` | `lang/en/news/index.html` |
| Contact Us | `/lang/en/contactus/index.html` | `lang/en/contactus/index.html` |

**Supporting folders:** `images/` and `img/` (both exist — check which one a page uses), `css/`, `js/`, `font/`, `pdf/` (downloadable documents like the company overview), `buttons/`.

---

## Option A — Quick edit in the browser (best for text/typo changes)

1. Open the repo and navigate to the file you want to change (use the table above).
2. Click the **pencil / "Edit this file"** icon at the top right of the file view.
3. Make your edit in the HTML.
4. Scroll down, click **Commit changes**, add a short message describing what you changed, and commit **directly to `main`** (or create a branch + pull request if you want someone to review first).
5. The site redeploys automatically. Check it live a minute or two later.

## Option B — Local copy (best for larger changes, new pages, or many edits)

1. Clone the repo:
   ```
   git clone https://github.com/dynamic-test-solutions/website.git
   cd website
   ```
2. Edit the files in your editor of choice.
3. **Preview before publishing.** Run a tiny local server so paths behave like the real site:
   ```
   python3 -m http.server 8000
   ```
   Then open `http://localhost:8000` in a browser. (Opening an `.html` file directly also works but can break some links/images.)
4. When it looks right, commit and push to `main`:
   ```
   git add .
   git commit -m "Describe your change"
   git push origin main
   ```
5. The push triggers an automatic redeploy.

## Confirming your change went live

- In the repo, go to the **Actions** tab — the latest **"pages build and deployment"** run should show a green check.
- Then hard-refresh the live page (Cmd/Ctrl+Shift+R) to bypass the cache. Changes typically appear within 1–2 minutes.

---

## ⚠️ Caveats and things NOT to do

**1. PHP and CGI do not work on this site.**
GitHub Pages serves static files only — it **cannot execute server-side code**. The repo still contains some legacy PHP and a `cgi-bin/` folder, but **none of it runs**:

- The **Employment Opportunities** (`career/index.php`) and **Inquiry** (`Inquiry/index.php`) form pages are **inert** — submissions go nowhere.
- Editing the PHP will not make it function; it isn't being processed at all.
- If you need a **working form** (contact, inquiry, careers), it must use one of these instead:
  - a third-party form service (e.g. Formspree, Basin, Getform, Tally) embedded in a static page,
  - a plain `mailto:` link, or
  - a serverless function (Cloudflare Worker / Pages Function) — a bigger lift.

Treat the `.php` files and `cgi-bin/` as legacy leftovers. Don't rely on them.

**2. Do NOT delete or rename the `CNAME` file in the repo root.**
That single file (it contains `dynamic-test.com`) is what binds the custom domain to GitHub Pages. Deleting it will drop the site back to its `*.github.io` address and break the domain and HTTPS. Leave it alone.

**3. There is no safety net — edits go live fast.**
There's no build check or staging step. A broken edit committed to `main` becomes the live site within a couple of minutes. Preview locally (Option B) for anything beyond a small text change, and consider using a pull request for review when multiple people are involved.

**4. Don't touch DNS, Cloudflare, or HTTPS settings to edit content.**
The domain and certificate are already configured and working (the site serves correctly over `https://`). Content edits never require changing DNS or Cloudflare. Leave that to whoever administers the domain.

**5. Keep asset paths consistent.**
When adding images or PDFs, drop them in the existing `images/`, `img/`, or `pdf/` folders and reference them with the same path style the surrounding page already uses.

**6. (Optional safeguard) `.nojekyll`.**
GitHub Pages runs files through Jekyll by default, which can occasionally mishandle folders/files that start with an underscore. If you ever add such files and they don't appear, adding an empty file named **`.nojekyll`** to the repo root disables that processing and serves everything as-is. Not required today, but good to know.

---

## If you break something (rollback)

Because every change is a commit, you can always go back:

- **Quick fix:** edit the file again to undo the change and commit.
- **Clean revert:** in the repo's commit history, find the bad commit and use **Revert** (web UI) — or locally, `git revert <commit-hash>` then push. This creates a new commit that restores the previous state, and the site redeploys to match.

---

## Quick reference

- **Live site:** https://dynamic-test.com (HTTPS)
- **Repo:** https://github.com/dynamic-test-solutions/website
- **Host:** GitHub Pages — deploys from `main`, root folder
- **DNS:** Cloudflare (DNS-only; not proxied)
- **Forms / dynamic features:** not supported (static hosting) — see Caveat 1
