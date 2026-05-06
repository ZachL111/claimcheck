# claimcheck

`claimcheck` is a PHP project for Security tooling. It turns validate OIDC-style claim, nonce, and redirect policy fixtures into a small local model with readable fixtures and a direct verification command.

## Reading Claimcheck

Start with the README, then open `metadata/project.json` to check the constants behind the examples. After that, `fixtures/cases.csv` shows the compact path and `examples/extended_cases.csv` gives a wider look at the same rule.

## Design Sketch

The design is intentionally direct: parse or construct a signal, score it, classify it, and verify the expected branch. This makes the repository useful for studying security tooling behavior without needing a service or database unless the language project itself is SQL. The PHP implementation uses strict types and a small namespaced policy class.

## Purpose

The repository exists to keep a technical idea small enough to reason about. The implementation avoids external dependencies where possible, then uses fixtures to make changes easy to review.

## What It Does

- Uses fixture data to keep policy checks changes visible in code review.
- Includes extended examples for replay guards, including `surge` and `degraded`.
- Documents claim validation tradeoffs in `docs/operations.md`.
- Runs locally with a single verification command and no external credentials.
- Stores project constants and verification metadata in `metadata/project.json`.

## Fixture Notes

`recovery` is the first example I would inspect because it lands on the `accept` path with a score of 169. The broader file also keeps `degraded` at -45 and `surge` at 198, which gives the model a useful low-to-high spread.

## Files Worth Reading

- `src`: primary implementation
- `tests`: verification harness
- `fixtures`: compact golden scenarios
- `examples`: expanded scenario set
- `metadata`: project constants and verification metadata
- `docs`: operations and extension notes
- `scripts`: local verification and audit commands

## Setup

Use a normal shell with PHP available on `PATH`. The verifier is written as a PowerShell script because the portfolio was assembled on Windows.

## Usage

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/verify.ps1
```

This runs the language-level build or test path against the compact fixture set.

## Verification

```powershell
powershell -NoProfile -ExecutionPolicy Bypass -File scripts/audit.ps1
```

The audit command checks repository structure and README constraints before it delegates to the verifier.

## Limits

The examples cover useful edges, not every edge. A larger version would add malformed-input tests, richer reports, and deeper domain parsers.

## Next Directions

- Add malformed input fixtures so the failure path is as visible as the happy path.
- Split the scoring constants into a typed configuration object and validate it before use.
- Add a comparison mode that shows how decisions change when one signal is adjusted.
- Add one more security tooling fixture that focuses on a malformed or borderline input.
