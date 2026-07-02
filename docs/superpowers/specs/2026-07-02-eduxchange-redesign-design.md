# EDUXCHANGE UI/UX Redesign Design

Date: 2026-07-02
Status: Approved design direction, pending implementation plan

## Product Context

EDUXCHANGE is a web-based bimbel platform. It should feel broader than school-only learning platforms because it supports academic learning, digital skills, language learning, career preparation, and other structured learning packages.

The product has two main user groups:

- Students, who can log in, browse learning packages, buy a package, access their own dashboard, and track learning progress.
- Admins, who are planned to monitor students, subscriptions, and learning progress across the platform.

The current Laravel app already includes login, register, logout, dashboard, courses, enrollments, payment flow, quiz, profile, certificates, courses, tutors, transactions, and enrollments. The redesign must preserve those flows.

## Scope

This phase focuses on UI/UX redesign plus visual preparation for admin and 30-day subscriptions.

Included:

- Redesign the landing page, auth pages, main navigation, student dashboard, course/package catalog, enrollment pages, payment pages, and related empty states.
- Reframe courses as learning packages where appropriate.
- Show package duration as 30 days in the UI.
- Add visual concepts for student progress, package status, and admin monitoring.
- Keep backend behavior compatible with the current Laravel data model.

Not included in this phase:

- Full admin authorization backend.
- Database changes for roles.
- Middleware that separates admin and student access.
- Real package expiry enforcement after 30 days.
- Preventing access to expired learning content at the backend level.

These backend features should be handled in a later implementation phase.

## Visual Direction

The selected direction is Modern SaaS Education.

The interface should be clean, professional, and premium while still feeling approachable for learners. The design should use a light background, strong typography, restrained cards, clear actions, and consistent status colors.

Primary visual choices:

- Use Tailwind/Vite styling consistently across public and authenticated pages.
- Remove or minimize Bootstrap usage on the landing page.
- Replace broken emoji/mojibake labels with clean text, CSS-based visual marks, or simple inline SVG icons when needed.
- Use blue/indigo as the primary brand range with emerald, amber, and rose reserved for status states.
- Use moderate border radius and avoid oversized rounded cards.
- Keep layouts readable on desktop and comfortable on mobile.

## Page Design

### Landing Page

The landing page should immediately communicate EDUXCHANGE as a broad online bimbel platform.

Primary sections:

- Sticky top navigation with EDUXCHANGE brand, login, register, and package CTA.
- Hero section with a clear headline about broader online bimbel access.
- Supporting copy explaining learning beyond school subjects.
- Primary CTA: Mulai Belajar.
- Secondary CTA: Lihat Paket.
- Category section for academic, digital skills, language, career, and exam preparation.
- Package preview using existing popular course data.
- Benefit section explaining progress tracking, flexible packages, tutor guidance, and 30-day access.
- Final CTA and footer.

### Login and Register

Auth pages should feel consistent with the landing page.

The layout should include:

- A brand panel that explains EDUXCHANGE briefly.
- A clean form panel with clear labels, validation states, and primary action.
- Links between login and register.
- Copy that works for both students and future admins, without exposing unfinished admin functionality.

### Student Dashboard

The dashboard should become the learner's command center.

Core sections:

- Welcome summary with learner name.
- Active package card showing package status, 30-day access language, and a future-ready remaining-days area that can connect to real expiry data in the backend phase.
- Progress card with percentage, progress bar, and checkpoints such as Materi, Kuis, and Sertifikat.
- Statistic cards for total courses, tutors, students, and transactions using existing stats.
- Continue learning area using popular or enrolled courses where current data supports it.
- Recommendation CTA to explore packages.

### Package Catalog

The courses page should be redesigned as a package catalog.

Each card should show:

- Package/course name.
- Category.
- Tutor name.
- 30-day access label.
- Price.
- Transaction/popularity indicator.
- Status badge for already enrolled versus not enrolled.
- Primary action: Berlangganan Paket or Lanjutkan Belajar.

The page should also include a header that explains packages as 30-day access.

### Admin Dashboard Concept

This phase should prepare the UI concept for admin monitoring without implementing the backend access system yet.

Admin concept sections:

- Overview metrics: total students, active packages, expired packages, average progress.
- Student progress table: student name, package, progress percentage, status, and a planned last-activity field.
- Package monitoring cards: active, expiring soon, expired.
- Clear visual distinction from the student dashboard.

This can be documented or scaffolded visually only if routes/controllers are not ready.

## Components

Reusable UI patterns:

- Brand lockup with EDUXCHANGE name and short tagline.
- Buttons: primary, secondary, subtle, danger.
- Status badges: Aktif, Belum Berlangganan, Expired, Populer.
- Package card.
- Progress card.
- Metric card.
- Empty state block.
- Responsive navigation.

The redesign should avoid nesting cards inside cards. Page sections should be full-width or constrained layouts, while cards are reserved for repeated items and focused dashboard widgets.

## Data and Flow

Existing backend data remains the source of truth.

Current data usage:

- `Course` powers popular packages and package catalog cards.
- `Tutor` and related `User` provide tutor names.
- `Transaction` count can support popularity indicators.
- `Enrollment` can indicate whether a student has access to a course.
- Existing dashboard stats continue to populate the dashboard.

Future data needs:

- User role: admin or student.
- Subscription start date.
- Subscription end date.
- Subscription status.
- Real progress per student and course.
- Last activity timestamp.

The UI should use neutral future-ready language for data that is not enforced yet, so users are not misled into thinking expiry enforcement already exists.

## Error Handling and Empty States

The UI should handle missing data gracefully:

- No packages: show a polished empty state and encourage checking again later.
- No enrollment: show a CTA to explore packages.
- Missing tutor: display Tutor EDUXCHANGE.
- Missing category: display Paket Belajar.
- Missing price: avoid broken formatting and show contact/admin-oriented fallback only if needed.

Session alerts for success, info, and error should keep working in the main app layout.

## Responsive Requirements

Desktop:

- Use multi-column layouts for hero, dashboard metrics, and package grids.
- Keep navigation compact and scan-friendly.

Mobile:

- Stack content vertically.
- Make CTAs full width where useful.
- Keep package cards readable.
- Ensure navbar menu is easy to open and close.
- Prevent long labels from overflowing buttons or cards.

## Testing and Verification

After implementation:

- Run `npm run build`.
- Verify landing page, login, register, dashboard, package catalog, enrollments, payment pages, and profile still render.
- Check desktop and mobile viewport behavior.
- Confirm login/register routes still work.
- Confirm package enrollment flow still posts to the existing route.
- Confirm no mojibake or broken icon text remains in visible UI.

## Implementation Notes

Implementation should be incremental:

1. Establish shared visual language in Tailwind and layout components.
2. Redesign navigation and app shell.
3. Redesign landing page.
4. Redesign auth shell and auth forms.
5. Redesign student dashboard.
6. Redesign package catalog.
7. Polish enrollment/payment/profile pages for consistency.
8. Add admin dashboard concept only as UI preparation unless backend role work is explicitly approved.

Backend role separation and 30-day subscription enforcement should be planned as a separate backend feature after this redesign phase.
