# Autumn House

The website for Autumn House, by Staying Season, at
**https://autumn.greensmokestudio.com**.

Plain PHP and HTML: no database, no framework. Fonts and scripts are self-hosted.

## Where things live

| To change… | Edit this |
| --- | --- |
| Wording on Home, The House, Family Stays, Enquire, Terms | The page's own file: `index.php`, `the-house.php`, `family-stays.php`, `enquire.php`, `terms.php`. The text is plain HTML. |
| Wording at the top of the FAQs and The Guide pages | `faqs.php`, `the-guide.php` |
| **FAQs** (every question, everywhere) | `content/faqs.md`: one file; instructions at its top |
| **Guide posts** | `content/guide/`: one file per post; copy `_template.md` to start a new one |
| Guide categories (Get to know, Local area, News) | `$guideCategories` in `includes/config.php` |
| Site name, Book now link, Instagram, announcement bar, menu | `includes/config.php` |
| Colours and fonts | The top of `css/style.css` |
| Header, footer, "Ready to stay?" band, review, Instagram row | `includes/header.php`, `footer.php`, `callout.php`, `review.php`, `instagram.php` |
| Logos and hand-drawn illustrations | `images/logos/`, `images/illustrations/` (SVG files; they take their colour from the page) |

### Showing FAQs on a page

In `content/faqs.md`, add `show on: family` under a question. Any page with
the line `<?= faq_list('family') ?>` then shows it. Family Stays, The House
and Enquire already have one (`family`, `house`, `enquire`).

### Photos

Every photo is the same placeholder for now. To use a real photo, put it in
`images/` (lower case, hyphens, no spaces, e.g. `images/house/kitchen.jpg`)
and change the line, for example from

    <?= placeholder('', '', '4/5') ?>

to

    <?= content_image('/images/house/kitchen.jpg', 'The kitchen in the morning', '', '4/5') ?>

The second part describes the photo for people who can't see it. `'4/5'` is
the shape (width/height); leave it as `''` to use the photo's own shape.

## Previewing on your computer

In Terminal, in this folder:

    php -S localhost:8000 router.php

then open http://localhost:8000. Draft Guide posts show up here, but not on
the live site.

## Publishing

Every change merged into `main` is checked and uploaded automatically by
GitHub Actions (`.github/workflows/deploy.yml`). Pull requests are only
checked. You'll see a green tick or a red cross next to each one in GitHub.

1. In **GitHub Desktop**, create a branch (Branch → New branch), make your
   changes, commit them, and click **Publish branch**.
2. Click **Create Pull Request**. GitHub checks every page loads with no errors.
3. When it's green, **Merge** it on github.com. The site updates a minute or two later.

The upload only sends files that changed, only deletes files it uploaded
itself, and refuses to upload anywhere except this site's own folder, so it
can never touch greensmokestudio.com.

**Settings it needs** (github.com → this repo → Settings → Secrets and variables → Actions):

| Name | Kind | Value |
| --- | --- | --- |
| `SFTP_HOST`, `SFTP_USER`, `SFTP_PASSWORD`, `SFTP_KNOWN_HOSTS` | Secrets | The Krystal login and server identity (same as the main site) |
| `REMOTE_DIR` | Variable | `autumn.greensmokestudio.com` |
| `ENQUIRY_EMAIL` | Variable | Where the Enquire form sends messages. Kept here, not in the code. |

**Rolling back:** Actions tab → *Deploy to Krystal* → *Run workflow*, and paste
the commit ID of the version you want live.

## Making Winter's Nook or Spring Hideaway

Copy this repository, then:

1. Change `includes/config.php` (name, links) and the colours at the top of
   `css/style.css`, and replace the files in `images/logos/`.
2. **The audience page.** Family Stays is written for Autumn House's usual
   guests; the other houses speak to a different audience. Rename
   `family-stays.php` (e.g. `couples-escapes.php`; the file name is the
   address), change its line in `$menu` in `includes/config.php`, its line in
   `dev/urls.txt`, and its `faq_list('family')` tag (plus the matching
   `show on:` tags in `content/faqs.md`). Old links to `/family-stays`
   then show "page not found".
3. Set that repository's `REMOTE_DIR` to its own subdomain folder
   (`winter.greensmokestudio.com` or `spring.greensmokestudio.com`).
