Scrum Digital Bootcamp - Detailed Debugging Project

How to use:
1. Open index.html in browser.
2. Ask students to observe the page visually first.
3. Do not allow DevTools for the first 5 minutes.
4. Students should write down visible issues.
5. Then inspect HTML/CSS and fix one issue at a time.

Intentional Issues:
- Navbar items are not vertically aligned.
- Enroll button touches/overflows the right edge.
- Hero columns do not stack properly on mobile.
- Hero image is fixed-width and may overflow.
- Invalid align-items: top.
- Feature cards have inconsistent width/height.
- Middle card is pushed down.
- Trainer cards use float and fixed widths.
- Contact form breaks on mobile.
- Missing responsive media queries.
- Inconsistent spacing and border radius.

Suggested fixes:
- Use align-items: center.
- Remove negative margin.
- Use Bootstrap responsive columns: col-lg-6 col-12.
- Use width: 100%; max-width: 100% for images.
- Remove unnecessary row flex overrides.
- Use consistent card heights or Bootstrap h-100.
- Use responsive grid instead of fixed card widths.
- Replace float with Flexbox or Bootstrap grid.
- Add media queries for mobile.