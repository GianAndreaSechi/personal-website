---
slug: "pywd-manager"
title: "PYWDManager"
subtitle: "An early experiment with encrypted local storage"
description: "A Python command-line experiment that stores encrypted credentials in SQLite using Fernet and a separate key file."
category: "Learning & experiments"
status: "Alpha experiment"
period: null
contribution: "Creator and developer"
tech_stack: ["Python", "Fernet", "SQLite", "CLI"]
is_featured: false
project_url: null
github_url: "https://github.com/GianAndreaSechi/PYWDManager"
image_url: null
sort_order: 8
---

## Why I built it

I created PYWDManager as a personal password wallet and a way to try Python’s cryptography library. It is an early learning project, kept here as part of that exploration.

## How it works

The application encrypts passwords using Fernet and stores them in a SQLite database. Setup generates a separate key file, which is required to decrypt the stored credentials. The configuration points to the database and key locations.

## Its limits

The repository describes the application as Alpha. It is not an audited password manager, and I would not present it as a replacement for a maintained credential-management tool.

The interesting part of the experiment is the relationship between encrypted data and key handling: storing encrypted values is only one part of the problem.
