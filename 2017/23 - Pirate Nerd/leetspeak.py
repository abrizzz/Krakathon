leetspeak_dict = {
    "a": "4",
    "b": "8",
    "c": "(",
    "d": ")",
    "e": "3",
    "f": "ƒ",
    "g": "6",
    "h": "#",
    "i": "!",
    "j": "_|",
    "k": "|<",
    "l": "1",
    "m": "|\/|",
    "n": "/\/",
    "o": "0",
    "p": "|*",
    "q": "()_",
    "r": "Я",
    "s": "$",
    "t": "7",
    "u": "(_)",
    "v": "\/",
    "w": "\/\/",
    "x": "><",
    "y": "Ч",
    "z": "2"
}

text = input("Enter text: ").lower()
leet = ""

for c in text:
    if c in leetspeak_dict:
        leet = leet + leetspeak_dict[c]
    else:
        leet = leet + c

print(leet)