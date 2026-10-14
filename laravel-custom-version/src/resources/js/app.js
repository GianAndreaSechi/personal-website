document.querySelectorAll('[data-site-terminal]').forEach((terminal) => {
    const output = terminal.querySelector('[data-terminal-output]');
    const input = terminal.querySelector('[data-terminal-input]');
    const responses = new Map([...terminal.querySelectorAll('template[data-terminal-response]')]
        .map((template) => [template.dataset.terminalResponse, template]));
    const commands = [...responses.keys(), 'clear'];
    const history = [];
    let historyIndex = 0;
    let draft = '';

    function run(value) {
        const command = value.trim().toLowerCase();
        if (!command) return;
        history.push(command);
        if (history.length > 50) history.shift();
        historyIndex = history.length;
        draft = '';
        input.value = '';

        if (command === 'clear') {
            output.replaceChildren();
            return;
        }

        const entry = document.createElement('div');
        const prompt = document.createElement('p');
        prompt.className = 'mb-2 text-indigo-300';
        prompt.textContent = `$ ${command}`;
        entry.append(prompt);
        if (responses.has(command)) {
            entry.append(responses.get(command).content.cloneNode(true));
        } else {
            const message = document.createElement('p');
            message.textContent = `Unknown command: ${command}. Type help for available commands.`;
            entry.append(message);
        }
        output.append(entry);
        while (output.children.length > 30) output.firstElementChild.remove();
        output.scrollTop = output.scrollHeight;
    }

    terminal.querySelector('[data-terminal-form]').addEventListener('submit', (event) => {
        event.preventDefault();
        run(input.value);
    });
    terminal.querySelectorAll('[data-terminal-command]').forEach((button) => {
        button.addEventListener('click', () => run(button.dataset.terminalCommand));
    });
    input.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
            event.preventDefault();
            if (historyIndex === history.length) draft = input.value;
            historyIndex = Math.max(0, Math.min(history.length,
                historyIndex + (event.key === 'ArrowUp' ? -1 : 1)));
            input.value = historyIndex === history.length ? draft : history[historyIndex];
        } else if (event.key === 'Tab' && input.value.trim()) {
            const matches = commands.filter((command) => command.startsWith(input.value.trim().toLowerCase()));
            if (matches.length === 1) {
                event.preventDefault();
                input.value = matches[0];
            }
        }
    });
    terminal.hidden = false;
});
