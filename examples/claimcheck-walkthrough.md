# Claimcheck Walkthrough

This note is the quickest way to read the extra review model in `claimcheck`.

| Case | Focus | Score | Lane |
| --- | --- | ---: | --- |
| baseline | trust boundary | 178 | ship |
| stress | claim drift | 110 | watch |
| edge | replay exposure | 242 | ship |
| recovery | policy width | 187 | ship |
| stale | trust boundary | 215 | ship |

Start with `edge` and `stress`. They create the widest contrast in this repository's fixture set, which makes them better review anchors than the middle cases.

If `stress` becomes less cautious without a clear reason, I would inspect the drag input first.
