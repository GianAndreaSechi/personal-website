---
slug: "c19-sdk"
title: "C19Sdk"
subtitle: "A Python interface to Italian COVID-19 datasets"
description: "A small Python parser that turns Italian Civil Protection COVID-19 data into objects with national, regional and provincial indicators."
category: "Open source"
status: "Historical project"
period: null
contribution: "Creator and developer"
tech_stack: ["Python", "JSON", "Open data"]
is_featured: false
project_url: null
github_url: "https://github.com/GianAndreaSechi/C19Sdk"
image_url: null
sort_order: 7
---

## What it does

C19Sdk provides a Python interface to the COVID-19 datasets published by the Italian Civil Protection. It returns objects for national, regional and provincial data, keeping the dataset’s Italian attribute names.

Alongside the source fields, it calculates some derived indicators, such as changes between observations and test positivity ratios.

## Why it exists

It makes the published data accessible from Python without repeating the same retrieval and parsing steps in each script. It belongs to the same period as [NearMe Data](/projects/near-me-data), which presents pandemic data in a browser.

## Current state

This is a small historical utility. The README documents the available objects and fields; compatibility with today’s dataset should be checked before reuse.

[Source datasets](https://github.com/pcm-dpc/COVID-19)
