# claimcheck

`claimcheck` keeps a focused PHP implementation around security tooling. The project goal is to validate OIDC-style claim, nonce, and redirect policy fixtures.

## Use Case

The point is to make a small domain rule concrete enough that a reader can change it and immediately see what broke.

## Claimcheck Review Notes

`edge` and `stress` are the cases worth reading first. They show the optimistic and cautious ends of the fixture.

## Highlights

- `fixtures/domain_review.csv` adds cases for trust boundary and claim drift.
- `metadata/domain-review.json` records the same cases in structured form.
- `config/review-profile.json` captures the read order and the two review questions.
- `examples/claimcheck-walkthrough.md` walks through the case spread.
- The PHP code includes a review path for `replay exposure` and `claim drift`.
- `docs/field-notes.md` explains the strongest and weakest cases.

## Code Layout

The core code exposes a scoring path and the added review layer uses `signal`, `slack`, `drag`, and `confidence`. The domain terms are `trust boundary`, `claim drift`, `replay exposure`, and `policy width`.

The added PHP path is deliberately direct, with fixtures doing most of the explaining.

## Run The Check

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/verify.ps1
```

## Regression Path

The same command runs the local verification path. The highest-scoring domain case is `edge` at 242, which lands in `ship`. The most cautious case is `stress` at 110, which lands in `watch`.

## Future Work

This remains a local project with deterministic fixtures. It does not depend on credentials, hosted services, or live data. Future work should add richer malformed inputs before widening the public API.
