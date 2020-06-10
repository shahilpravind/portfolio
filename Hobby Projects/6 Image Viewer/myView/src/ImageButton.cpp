#include "ImageButton.h"


ImageButton::ImageButton(sf::String path) {
	rect = new sf::RectangleShape();
	rect->setFillColor(sf::Color(0x0F111AFF));
	
	tex = new sf::Texture();
	tex->loadFromFile(path);
	tex->setSmooth(true);

	sprite = new sf::Sprite(*tex);

	setSize(BTN_SIZE, BTN_SIZE);
}

ImageButton::~ImageButton() {
	delete rect;
	delete tex;
	delete sprite;

	rect = nullptr;
	tex = nullptr;
	sprite = nullptr;
}


void ImageButton::show(sf::RenderWindow &window) {
	window.draw(*rect);
	window.draw(*sprite);
}

void ImageButton::onHover(int mx, int my) {
	bool cond1 = mx >= rect->getPosition().x;
	bool cond2 = mx <= rect->getPosition().x + rect->getSize().x;
	bool cond3 = my >= rect->getPosition().y;
	bool cond4 = my <= rect->getPosition().y + rect->getSize().y;

	if (cond1 && cond2 && cond3 && cond4) {
		if (!hovering) {
			rect->setFillColor(sf::Color::Red);
			hovering = true;
		}
	} else {
		if (hovering) {
			rect->setFillColor(sf::Color(0x0F111AFF));
			hovering = false;
		}
	}
}

void ImageButton::onClick(int mx, int my, Image *image) {
	if (onClickMethod != nullptr) {
		bool cond1 = mx >= rect->getPosition().x && mx <= rect->getPosition().x + rect->getSize().x;
		bool cond2 = my >= rect->getPosition().y && my <= rect->getPosition().y + rect->getSize().y;

		if (cond1 && cond2) {
			(image->*onClickMethod)();
		}
	}
}

void ImageButton::bind(void(Image::*fp)()) {
	onClickMethod = fp;
}


void ImageButton::centerImage() {
	float x = rect->getPosition().x + ((rect->getSize().x - tex->getSize().x * sprite->getScale().x) / 2);
	float y = rect->getPosition().y + ((rect->getSize().y - tex->getSize().y * sprite->getScale().y) / 2);

	sprite->setPosition(x, y);
}


void ImageButton::setSize(float w, float h) {
	rect->setSize(sf::Vector2f(w, h));

	if (w < h) {
		sprite->setScale((float)(w - IMG_PADDING) / (float)tex->getSize().x, (float)(w - IMG_PADDING) / (float)tex->getSize().x);
	} else {
		sprite->setScale((float)(h - IMG_PADDING) / (float)tex->getSize().y, (float)(h - IMG_PADDING) / (float)tex->getSize().y);
	}

	centerImage();
}

void ImageButton::setPos(float x, float y) {
	rect->setPosition(x, y);
	centerImage();
}

