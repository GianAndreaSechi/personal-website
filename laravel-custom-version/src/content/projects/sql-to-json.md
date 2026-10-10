---
slug: "sql-to-json"
title: "SQLtoJSON"
subtitle: "Query results as JSON"
description: "A small Python utility for running a SQL query through ODBC and exporting its results as JSON."
category: "Open source"
status: "Earlier utility"
period: null
contribution: "Creator and developer"
tech_stack: ["Python", "pyodbc", "SQL", "JSON"]
is_featured: false
project_url: null
github_url: "https://github.com/GianAndreaSechi/SQLtoJSON"
image_url: null
sort_order: 10
---

## What it does

SQLtoJSON opens an ODBC database connection, runs a supplied query and returns its result as JSON. The repository includes examples of connection configuration and the export function.

## The context

It is a small utility for moving information between a database and code that expects JSON, rather than a complete data integration platform.

## Current state

It requires pyodbc and a suitable ODBC driver. The original implementation is preserved in the repository; check configuration and behaviour before using it with a current database.
