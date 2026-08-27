# CC-SEO-001: PLAIN-ENGLISH SEO GUIDE

> **DOCUMENT SUMMARY & PURPOSE:**
> - **File Purpose:** Outlines on-page SEO meta tags, title formulas, header structures, and `ProfessionalService` JSON-LD schema.
> - **Who Prepares It:** Technical SEO Specialist.
> - **Who Consumes It:** Web Developer & Content Creator.
> - **How to Use It:** Embed the JSON-LD schema block into the website `<head>` and format page headers according to the H1/H2 guidelines.

---

**Asset ID:** CC-SEO-001
**Category:** SEO System
**Client:** [CLIENT_NAME] | **Business:** [BUSINESS_NAME]

---

## 1. EASY PAGE TITLE & DESCRIPTION GUIDE

- **Page Title:** [PRIMARY_OFFER] for [TARGET_AUDIENCE] | [BUSINESS_NAME]
- **Page Summary (Meta Description):** Struggling with [CORE_PROBLEM]? See how [BUSINESS_NAME] helps you get [DESIRED_OUTCOME] simply and predictably. Book a free strategy chat today!
- **Main Page Title (H1):** How [TARGET_AUDIENCE] Can Get [DESIRED_OUTCOME]
- **Sub-headings (H2):**
  - Why [CORE_PROBLEM] Holds Business Owners Back
  - Our Simple 3-Step Solution: [UNIQUE_MECHANISM]
  - Real Success Stories & Reviews
  - Frequently Asked Questions

---

## 2. GOOGLE BUSINESS LISTING SCHEMA (PLAIN STRUCTURE)

```json
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "[BUSINESS_NAME]",
  "url": "[WEBSITE_URL]",
  "description": "Helping [TARGET_AUDIENCE] solve [CORE_PROBLEM] with [PRIMARY_OFFER].",
  "provider": {
    "@type": "Person",
    "name": "[CLIENT_NAME]"
  }
}
```
