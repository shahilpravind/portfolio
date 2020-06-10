#pragma once
#include <SFML/Graphics.hpp>
#include "Constants.h"
#include "Image.h"


class ImageButton {
private:
	const static int IMG_PADDING = 10;

	bool hovering = false;

	sf::RectangleShape *rect;
	sf::Texture *tex;
	sf::Sprite *sprite;

	void(Image::*onClickMethod)() = nullptr;

	void centerImage();

public:
	ImageButton(sf::String);
	~ImageButton();

	void show(sf::RenderWindow &window);
	void onHover(int, int);
	void onClick(int, int, Image *);
	void bind(void(Image::*)());

	void setSize(float, float);
	void setPos(float, float);

	float getWidth() { return rect->getSize().x; }
	float getHeight() { return rect->getSize().y; }
	float getX() { return rect->getPosition().x; }
	float getY() { return rect->getPosition().y; }
};

