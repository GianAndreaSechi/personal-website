# Personal website editorial refresh

The site is written in English. Home introduces Gian Andrea; About carries the personal story; Projects document context, contribution and status; Resume holds career details; the blog leaves room for software and other interests.

## Sources checked

- Existing site templates and published homepage: https://gianandreasechi.com/
- Public LinkedIn content, available through search but with incomplete employment details: https://it.linkedin.com/in/gian-andrea-sechi
- Public GitHub profile and repository inventory: https://github.com/GianAndreaSechi
- irides README and repository: https://github.com/GianAndreaSechi/irides
- OpenF1 SDK and MCP README files, alongside upstream attribution: https://github.com/GianAndreaSechi/openf1
- PYWDManager README: https://github.com/GianAndreaSechi/PYWDManager
- C19Sdk README: https://github.com/GianAndreaSechi/C19Sdk
- JQueryString README: https://github.com/GianAndreaSechi/JQueryString
- School project README and C implementations: https://github.com/GianAndreaSechi/tesi-sistemi-dinamici-integrazione-numerica
- SQLtoJSON and DailyCodingProblemSolution README files.

## Corrections made

- Removed irides from the pandemic-project narrative and replaced guarantees of zero hallucinations with an explanation of schema context and its limits.
- Removed hardcoded package versions, installation claims and storage-backend promises from the website. Current instructions remain in the repository.
- Attributed the original OpenF1 API to its upstream project; described Gian Andrea's SDK and MCP additions separately.
- Replaced PYWDManager's unsupported master-password/AES/PBKDF2 feature list with Fernet, SQLite and a separate key file; retained its Alpha/learning context.
- Removed undocumented JQueryString chaining and nested serialization claims.
- Described the school work as a school project, covering Euler, RK2 and RK4 on the Lorenz model.
- Separated NearMe's co-founding from the development contribution, and stated its closure in May 2021.
- Labelled NearMe Data historical rather than promising up-to-date monitoring.
- Removed stock project covers and kept page URLs and slugs. The Resume page offers a “Request my CV” email link with a prefilled subject; there is no public download endpoint.
- Verified that the public NearMe Data dashboard responds with HTTP 200; its link points to the existing public installation, including from local previews.
- Replaced the contact form, which acknowledged messages without sending or saving them, with direct email and profile links.
- Reduced repetition and numerical claims in Resume; detailed measurements can remain in the source CV pending confirmation.

## Owner checks still useful

The copy is intentionally conservative. Before adding more detail, confirm:

- Exact professional titles and progression dates, especially the January 2026 senior promotion; these currently follow existing website material.
- The scope, time period and disclosure status of cost, vulnerability, throughput and uptime measurements in the original CV. They are not repeated as unqualified website claims.
- Whether the historical dashboard still retrieves data, which sources remain available and whether its legacy application should remain publicly reachable.
- Credential URLs and dates for the courses in config/profile.php. Course names follow existing site material; public LinkedIn corroborates only part of that list. OSSU is described as independent study, not a degree.
- The school competition names and years, which follow the existing site. The diploma with honours and national recognition are corroborated by public LinkedIn information.

## Applying content to an existing installation

Back up the database using the normal deployment process, deploy the files and run:

```sh
php artisan migrate --force
php artisan projects:sync --dry-run
php artisan projects:sync
php artisan blog:sync --slug=welcome-to-my-new-website --preserve-publication-date
npm run build
php artisan optimize:clear
```

`projects:sync` updates matching slugs, creates missing catalog projects and preserves other projects and all articles. Before updating existing projects it saves their previous records under storage/app/content-backups. A second run without edits leaves timestamps unchanged. The targeted blog command only refreshes the welcome article and preserves its existing publication date.

For a new installation the PortfolioSeeder reads these same Markdown sources and avoids replacing existing records. Do not reset an existing database to apply editorial changes.

The GitHub profile proposal and article outlines in this folder are drafts. They are not uploaded or published by these commands.
