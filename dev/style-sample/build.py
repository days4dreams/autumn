# Builds the style sample: inlines logos (recoloured) and generates torn-paper edges.
import re, random, sys, pathlib
here = pathlib.Path(__file__).parent
logos = here.parent.parent / 'images' / 'logos'

def inline_svg(name, cls):
    s = (logos / f'{name}.svg').read_text()
    s = s[s.index('<svg'):]
    s = re.sub(r'<svg[^>]*?viewBox="([^"]+)"[^>]*>', lambda m: f'<svg class="{cls}" viewBox="{m.group(1)}" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">', s, count=1)
    s = re.sub(r'\s(serif:id|xml:space|xmlns:serif|xmlns:xlink)="[^"]*"', '', s)
    s = s.replace('fill:white;', 'fill:var(--knockout);')  # white knockouts take the background colour
    s = re.sub(r'id="([^"]+)"', lambda m: f'id="{name}-{m.group(1)}"', s)
    s = re.sub(r'url\(#([^)]+)\)', lambda m: f'url(#{name}-{m.group(1)})', s)
    s = re.sub(r'href="#([^"]+)"', lambda m: f'href="#{name}-{m.group(1)}"', s)
    return re.sub(r'>\s+<', '><', s)

def torn_edge(seed, w=1200, h=28, step=(6, 18), amp=(4, 24)):
    """An SVG path whose top edge is ragged, filled to the bottom: a torn strip."""
    # A wandering line (random walk) with small jitter, so it reads as torn paper
    # rather than a saw blade; now and then a deeper nick.
    r = random.Random(seed); x = 0; y = (amp[0] + amp[1]) / 2; pts = []
    while x < w:
        y = min(amp[1], max(amp[0], y + r.uniform(-3.5, 3.5)))
        nick = r.uniform(3, 7) if r.random() < .06 else 0
        pts.append((x, y + r.uniform(-1.2, 1.2) + nick)); x += r.uniform(*step)
    pts[0] = (0, (amp[0] + amp[1]) / 2)
    pts.append((w, pts[0][1]))  # same height at both ends so the strip tiles
    d = 'M0 %d ' % h + ' '.join('L%.1f %.1f' % p for p in pts) + f' L{w} {h} Z'
    svg = f"<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 {w} {h}' preserveAspectRatio='none'><path d='{d}'/></svg>"
    return "url(\"data:image/svg+xml," + svg.replace('<', '%3C').replace('>', '%3E').replace('#', '%23') + "\")"

def torn_card(seed, n=46, depth=1.4):
    """A clip-path polygon with slightly ragged edges all round, for a torn-card look."""
    r = random.Random(seed); pts = []
    for i in range(n): pts.append((i / n * 100, r.uniform(0, depth)))
    for i in range(n): pts.append((100 - r.uniform(0, depth * .7), i / n * 100))
    for i in range(n): pts.append((100 - i / n * 100, 100 - r.uniform(0, depth)))
    for i in range(n): pts.append((r.uniform(0, depth * .7), 100 - i / n * 100))
    return 'polygon(' + ','.join('%.2f%% %.2f%%' % p for p in pts) + ')'

html = (here / 'template.html').read_text()
for k, v in {
    '{{LOGO}}': inline_svg('primary-logo', 'logo'),
    '{{STAMP}}': inline_svg('stamp', 'stamp'),
    '{{MONOGRAM}}': inline_svg('a-h-circle', 'monogram'),
    '{{TORN_A}}': torn_edge(3, step=(2, 6), amp=(6, 20)), '{{TORN_B}}': torn_edge(11, step=(2, 5), amp=(3, 17)),
    '{{CARD_CLIP}}': torn_card(7),
}.items():
    html = html.replace(k, v)
(here / 'autumn-house-style.html').write_text(html)
print(len(html))
