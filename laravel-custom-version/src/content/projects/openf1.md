---
slug: "openf1"
title: "OpenF1 SDK & MCP"
subtitle: "Exploring Formula 1 data through Python and MCP"
description: "A side project adding a Python SDK and MCP tools around the OpenF1 API, for exploring race and telemetry data."
category: "Open source"
status: "Personal experiment"
period: null
contribution: "SDK and MCP integration around the upstream OpenF1 API"
tech_stack: ["Python", "Pydantic", "pandas", "FastMCP", "REST APIs"]
is_featured: false
project_url: null
github_url: "https://github.com/GianAndreaSechi/openf1"
image_url: null
sort_order: 2
---

## The project

This repository brings together a Python SDK and an MCP server for accessing data from OpenF1. It is a way to explore both a data API and the tools that can sit around it.

## My contribution

The original OpenF1 API is an existing project by Bruno Gonçalves and its contributors. My work adds SDK and MCP functionality around that API; I did not create the underlying Formula 1 data service.

The SDK wraps endpoints for sessions, drivers, laps, telemetry and other race information in Python clients and Pydantic models. The MCP server exposes tools that call the SDK. The repository includes the upstream API code alongside these additions.

## An example

The SDK documentation shows how to request laps for a particular session and driver, then turn the returned models into a pandas DataFrame. The MCP interface makes the same kind of data accessible to tools that use the protocol.

## Current state

This is a spare-time project, developed with assistance from Gemini CLI as noted in the SDK README. Availability and freshness of the data depend on the upstream service. Check the repository for setup instructions and current capabilities.

[My repository](https://github.com/GianAndreaSechi/openf1) · [Original OpenF1 project](https://github.com/br-g/openf1)
