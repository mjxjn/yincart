<?php

/**
 * This is the model class for table "{{item}}".
 *
 * The followings are the available columns in table '{{item}}':
 * @property integer $item_id
 * @property integer $category_id
 * @property string $title
 * @property string $sn
 * @property string $unit
 * @property integer $stock
 * @property string $min_number
 * @property string $market_price
 * @property string $shop_price
 * @property string $props
 * @property string $props_name
 * @property string $prop_imgs
 * @property string $pic_url
 * @property string $item_imgs
 * @property string $desc
 * @property integer $is_show
 * @property integer $is_promote
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $is_best
 * @property string $click_count
 * @property integer $sort_order
 * @property integer $create_time
 * @property integer $update_time
 * @property string $language
 */
class Item extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Item the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{item}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, unit, min_number, pic_url, desc, language', 'required'),
            array('category_id, stock, is_show, is_promote, is_new, is_hot, is_best, sort_order, create_time, update_time', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 800),
            array('sn', 'length', 'max' => 120),
            array('unit, currency', 'length', 'max' => 20),
            array('min_number', 'length', 'max' => 100),
            array('market_price, shop_price', 'length', 'max' => 10),
            array('pic_url', 'length', 'max' => 255),
            array('click_count', 'length', 'max' => 11),
            array('language', 'length', 'max' => 45),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('item_id, category_id, title, sn, unit, stock, min_number, market_price, shop_price, props, props_name, prop_imgs, pic_url, item_imgs, desc, is_show, is_promote, is_new, is_hot, is_best, click_count, sort_order, create_time, update_time, language', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'category_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'item_id' => 'ID',
            'category_id' => '分类',
            'title' => '商品名称',
            'sn' => '货号',
            'unit' => '计量单位',
            'stock' => '总库存',
            'min_number' => '最少订货量',
            'market_price' => '零售价',
            'shop_price' => '批发价',
            'currency' => '货币',
            'props' => '商品属性',
            'props_name' => '属性名称',
            'prop_imgs' => '属性图片',
            'pic_url' => '商品图片',
            'item_imgs' => '商品图集',
            'desc' => '商品描述',
            'is_show' => '上架',
            'is_promote' => '促销',
            'is_new' => '新品',
            'is_hot' => '热销',
            'is_best' => '精品',
            'click_count' => '浏览次数',
            'sort_order' => '排序',
            'create_time' => '创建时间',
            'update_time' => '更新时间',
            'language' => '语言',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('sn', $this->sn, true);
        $criteria->compare('unit', $this->unit, true);
        $criteria->compare('stock', $this->stock);
        $criteria->compare('min_number', $this->min_number, true);
        $criteria->compare('market_price', $this->market_price, true);
        $criteria->compare('shop_price', $this->shop_price, true);
        $criteria->compare('props', $this->props, true);
        $criteria->compare('props_name', $this->props_name, true);
        $criteria->compare('prop_imgs', $this->prop_imgs, true);
        $criteria->compare('pic_url', $this->pic_url, true);
        $criteria->compare('item_imgs', $this->item_imgs, true);
        $criteria->compare('desc', $this->desc, true);
        $criteria->compare('is_show', $this->is_show);
        $criteria->compare('is_promote', $this->is_promote);
        $criteria->compare('is_new', $this->is_new);
        $criteria->compare('is_hot', $this->is_hot);
        $criteria->compare('is_best', $this->is_best);
        $criteria->compare('click_count', $this->click_count, true);
        $criteria->compare('sort_order', $this->sort_order);
        $criteria->compare('create_time', $this->create_time);
        $criteria->compare('update_time', $this->update_time);
        $criteria->compare('language', $this->language, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function getShow() {
        echo $this->is_show == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getPromote() {
        echo $this->is_promote == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getNew() {
        echo $this->is_new == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getHot() {
        echo $this->is_hot == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function getBest() {
        echo $this->is_best == 1 ? CHtml::image(Yii::app()->request->baseUrl . '/images/yes.gif') : CHtml::image(Yii::app()->request->baseUrl . '/images/no.gif');
    }

    public function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->create_time = $this->update_time = time();
            }
            else
                $this->update_time = time();
            return true;
        }
        else
            return false;
    }

    public function getTitle() {
        return CHtml::link($this->title, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    public function getBtnList() {
        return CHtml::textField('qty', $this->min_number, array('size' => '2', 'maxlength' => '5', 'id' => 'qty_' . $this->item_id)) . '&nbsp;'
                . CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_buy.gif'), '#', array('id' => 'btn-buy-' . $this->item_id, 'onclick' => 'fastBuy(this, ' . $this->item_id . ', $("#qty_' . $this->item_id . '").val())'
                ))
                . '&nbsp;' . CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/btn_addwish.gif'), '#', array('id' => 'btn-addwish-' . $this->item_id));
    }

    public function getListThumb() {
        $img = '/upload/item/' . $this->pic_url;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(150, 150, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->title);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    public function getImage() {
        $img = '/upload/item/' . $this->pic_url;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(310, 310, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->title);
        return $img_thumb_now;
    }

    public function getSmallThumb() {
        $img = '/upload/item/' . $this->pic_url;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(40, 40, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->title);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    public function getRecentThumb() {
        $img = '/upload/item/' . $this->pic_url;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(50, 50, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->title);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

    public function getRecommendThumb() {
        $img = '/upload/item/' . $this->pic_url;
        $img_thumb = Yii::app()->request->baseUrl . ImageHelper::thumb(80, 80, $img, array('method' => 'resize'));
        $img_thumb_now = CHtml::image($img_thumb, $this->title);
        return CHtml::link($img_thumb_now, array('/item/view', 'id' => $this->item_id), array('title' => $this->title));
    }

}